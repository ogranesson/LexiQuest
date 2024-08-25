<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function view($username) {
        try {
            $user = User::where('username', $username)->firstOrFail();

            $now = Carbon::now();
            $user_creation = Carbon::parse($user->created_on);

            $diff = $user_creation->diffForHumans($now, true);

            return view('profile', ['user' => $user, 'diff' => $diff]);
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }

    public function edit($username) {
        $countries = [
            'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina',
            'Armenia', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados',
            'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana',
            'Brazil', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia', 'Cameroon',
            'Canada', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo',
            'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica',
            'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia',
            'Eswatini', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana',
            'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hungary',
            'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan',
            'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon',
            'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi',
            'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico',
            'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar',
            'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Korea',
            'North Macedonia', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru',
            'Philippines', 'Poland', 'Portugal', 'Qatar', 'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis',
            'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe',
            'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia',
            'Solomon Islands', 'Somalia', 'South Africa', 'South Korea', 'South Sudan', 'Spain', 'Sri Lanka',
            'Sudan', 'Suriname', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand',
            'Timor-Leste', 'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu',
            'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan',
            'Vanuatu', 'Vatican City', 'Venezuela', 'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe'
        ];

        return view('edit-profile', ['countries' => $countries]);
    }

    public function save(Request $request, $username) {
        $user = User::where('username', $username)->firstOrFail();

        $validated_data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'photo' => ['sometimes', 'mimes:jpg,jpeg,png', 'max:20480'],
        ]);

        if (request()->hasFile('photo')) {
            $manager = new ImageManager(new Driver([]));
            $image = $manager->read(request()->file('photo'));
            $size = min($image->width(), $image->height());
            $image->crop($size, $size, position: 'center');

            $extension = request()->file('photo')->getClientOriginalExtension();
            $path = 'avatars/' . time() . '_' . Str::random(40) . '.' . $extension;

            $image->save(public_path($path));
            $validated_data['photo'] = $path;
        }
        else
        {
            $validated_data['photo'] = 'avatars/default.png';
        }
        
        $user->fill($validated_data);

        if ($user->isDirty()) {
            $user->save();
        }

        return redirect()->route('view-profile', ['username' => Auth::user()->username]);
    }

    public function ban($username) {
        try {
            $user = User::where('username', $username)->firstOrFail();

            if($user->is_banned != 1) {
                $user->is_banned = 1;
                $user->save();
            }
            else {
                return redirect()->back()->with('error', 'User is already banned!');
            }

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.404', ['message' => 'User \''. $username. '\' not found.'], 404);
        }
    }

    public function unban($username) {
        try {
            $user = User::where('username', $username)->firstOrFail();

            if($user->is_banned != 0) {
                $user->is_banned = 0;
                $user->save();
            }
            else {
                return redirect()->back()->with('error', 'User is not banned!');
            }

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.404', ['message' => 'User \''. $username. '\' not found.'], 404);
        }
    }
}
