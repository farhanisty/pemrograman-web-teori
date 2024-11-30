<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Customer</title>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>Company Name</th>
                <th>Contact Name</th>
                <th>Contact Title</th>
                <th>Address</th>
                <th>City</th>
                <th>Region</th>
                <th>Postal Code</th>
                <th>Country</th>
                <th>Phone</th>
                <th>FAX</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->CustomerID }}</td>
                    <td>{{ $customer->CompanyName }}</td>
                    <td>{{ $customer->ContactName }}</td>
                    <td>{{ $customer->ContactTitle }}</td>
                    <td>{{ $customer->Address }}</td>
                    <td>{{ $customer->City }}</td>
                    <td>{{ $customer->Region }}</td>
                    <td>{{ $customer->PostalCode }}</td>
                    <td>{{ $customer->Country }}</td>
                    <td>{{ $customer->Phone }}</td>
                    <td>{{ $customer->FAX }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
