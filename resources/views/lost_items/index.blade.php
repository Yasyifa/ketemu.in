<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost Items</title>
</head>
<body>

    <h1>Lost Items</h1>
    @if($lostItems->isEmpty())
        <p>No lost items available.</p>
    @else
        @foreach($lostItems as $item)
            <div>
                <h3>{{ $item->item_name }}</h3>
                <p>{{ $item->description }}</p>
                <p>Phone: {{ $item->phone_number }}</p>
                <p>Location: {{ $item->last_location }}</p>
                @if($item->image_path)
                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->item_name }}">
                @endif
            </div>
        @endforeach
    @endif

</body>
</html>
