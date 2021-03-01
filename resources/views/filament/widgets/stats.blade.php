<div class="grid grid-cols-1 col-span-1 gap-4 lg:col-span-2 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
    <x-filament::card>
        <div class="font-mono text-sm text-gray-500 truncate">Total Customers</div>

        <div wire:poll.10s class="text-4xl font-medium">{{ number_format(\App\Models\Customer::count()) }}</div>
    </x-filament::card>

    <x-filament::card>
        <div class="font-mono text-sm text-gray-500 truncate">Total Orders</div>

        <div wire:poll.10s class="text-4xl font-medium">{{ number_format(\App\Models\Order::count()) }}</div>
    </x-filament::card>

    <x-filament::card>
        <div class="font-mono text-sm text-gray-500 truncate">Total Products</div>

        <div wire:poll.10s class="text-4xl font-medium">{{ number_format(\App\Models\Product::count()) }}</div>
    </x-filament::card>
</div>
