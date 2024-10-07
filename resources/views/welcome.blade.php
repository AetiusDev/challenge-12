<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
        @foreach ($products as $product)
           <article>
                <h2>{{ $product->name }}</h2>
                <p>Categories:</p>
                <ul>
                    @foreach ($product->categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
                <p>Reviews: {{ $product->reviews->count() }}; Reviews with a rating 4+: {{ $product->goodReviews->count() }}</p>
                <ul>
                    @foreach ($product->reviews as $review)
                        <li>{{ $review->rating }}</li>
                    @endforeach
                </ul>
            </article> 
        @endforeach
    </body>
</html>
