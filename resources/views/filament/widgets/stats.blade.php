<div class="col-span-1 lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-8">
    <x-filament::card>
        <div class="font-mono text-gray-500 truncate">Total Customers</div>

        <div class="text-4xl font-medium">{{ number_format(\App\Models\Customer::count()) }}</div>
    </x-filament::card>

    <x-filament::card>
        <div class="font-mono text-gray-500 truncate">Total Orders</div>

        <div class="text-4xl font-medium">{{ number_format(\App\Models\Order::count()) }}</div>
    </x-filament::card>

    <x-filament::card>
        <div class="font-mono text-gray-500 truncate">Total Products</div>

        <div class="text-4xl font-medium">{{ number_format(\App\Models\Product::count()) }}</div>
    </x-filament::card>
</div>
