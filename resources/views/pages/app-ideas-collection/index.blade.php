
@extends('layouts.site-layout')

@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>App Ideas Collection</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2>Tier-1: Beginner Projects</h2>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Short Description</th>
                        <th>Tier</th>
                    </tr>
                    <tr>
                        <td>Bin2Dec</td>
                        <td>Binary-to-Decimal number converter</td>
                        <td>1-Beginner</td>
                    </tr>
                    <!-- Repeat the below pattern for each project -->
                    <tr>
                        <td>Border Radius Previewer</td>
                        <td>Preview how CSS3 border-radius values affect an element</td>
                        <td>1-Beginner</td>
                    </tr>
                    <!-- ... Other projects here ... -->
                    <tr>
                        <td>Weather App</td>
                        <td>Get the temperature, weather condition of a city.</td>
                        <td>1-Beginner</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection
