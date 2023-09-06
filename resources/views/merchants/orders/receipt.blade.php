<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <title>Receipt</title>
    <style>
        @media print {
            .print-container {
                max-width: 4in;
                font-size: 10px;
            }

            .print-header {
                text-align: center;
                font-weight: bold;
            }

            .print-footer {
                text-align: center;
                margin-top: 20px;
            }
        }
    </style>

</head>

<body>
    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div class="print-container mx-auto p-4">
            <div class="print-header mb-4">
                <h1 class="text-6xl font-bold text-gray-400">Recipe {{ $order->id }}</h1>

            </div>

            <div class="border-b mb-4"></div>
            <div class="my-2">
                <p>Date: 06/09/2023</p>
            </div>

            <div class="flex items-center justify-between text-xs">
                <div class="border-r flex flex-1 flex-col items-center">
                    <p>Total</p>
                    <p>70</p>
                    <p>AED</p>
                </div>
                <div class="border-r flex flex-1 flex-col items-center text-center">
                    <p>Discount Rate</p>
                    <p>0</p>
                    <p>%</p>
                </div>
                <div class="border-r flex flex-col items-center flex-1">
                    <p>VAT</p>
                    <p>6</p>
                    <p>AED</p>
                </div>
                <div class="flex flex-col items-center flex-1">
                    <p>Total</p>
                    <p>70.5</p>
                    <p>AED</p>
                </div>
            </div>
            <div class="my-6"></div>
            @php
                $total = 0;
            @endphp
            @foreach ($order->details as $item)
                <div class="flex text-sm justify-between">
                    <p class="">Beef Burger</p>
                    <p>{{ $item->product->name }}</p>
                    <p>{{ $item->price }}</p>
                    <p>{{ $item->qty * $item->price }}</p>
                    @php
                        $total += $item->qty * $item->price;
                    @endphp
                </div>
            @endforeach

            <div class="border-b mb-4"></div>

            <div class="text-right">
                <p>Subtotal: AED {{ $total }}</p>
                <p>Tax: AED {{ $order->vat }}</p>
                <p>Total: AED {{ $order->vat + $total }}</p>
            </div>

            <div class="print-footer">
                <p>Thank you for your business!</p>
            </div>
        </div>
    </div>

</body>

</html>
