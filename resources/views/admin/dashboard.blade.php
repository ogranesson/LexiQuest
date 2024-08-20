<x-main-layout title="Admin Dashboard">
    Welcome to the admin page.
    <x-chartjs-component :chart="$monthlyPosts" />
    <x-chartjs-component :chart="$weeklyPosts" />
    <x-chartjs-component :chart="$monthlyTopics" />
    <x-chartjs-component :chart="$weeklyTopics" />
</x-main-layout>
