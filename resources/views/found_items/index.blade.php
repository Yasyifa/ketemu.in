<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Found Items</title>
</head>
<body>

    <h1>Found Items</h1>
    @if($foundItems->isEmpty())
        <p>No found items available.</p>
    @else
        @foreach($foundItems as $item)
            <div>
                <h3>{{ $item->item_name }}</h3>
                <p>{{ $item->description }}</p>
                <p>Phone: {{ $item->phone_number }}</p>
                <p>Location: {{ $item->current_location }}</p>
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->item_name }}">
                @endif
            </div>
        @endforeach
    @endif

</body>
</html>
