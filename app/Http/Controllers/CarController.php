<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CarController extends Controller
{
    private $cars = [
        ['id' => 1, 'title' => 'Toyota Corolla', 'status' => 'available', 'notes' => 'Well maintained'],
        ['id' => 2, 'title' => 'Honda Civic', 'status' => 'sold', 'notes' => 'New tires installed'],
        ['id' => 3, 'title' => 'Ford Mustang', 'status' => 'available', 'notes' => 'Classic muscle car'],
        ['id' => 4, 'title' => 'Chevrolet Camaro', 'status' => 'pending', 'notes' => 'Needs minor repairs'],
        ['id' => 5, 'title' => 'Tesla Model 3', 'status' => 'available', 'notes' => 'Electric car, low mileage'],
        ['id' => 6, 'title' => 'BMW 3 Series', 'status' => 'sold', 'notes' => 'Luxury sedan'],
        ['id' => 7, 'title' => 'Mercedes-Benz C-Class', 'status' => 'available', 'notes' => 'Leather seats, sunroof'],
        ['id' => 8, 'title' => 'Audi A4', 'status' => 'pending', 'notes' => 'Needs engine check'],
        ['id' => 9, 'title' => 'Nissan Altima', 'status' => 'available', 'notes' => 'Good fuel efficiency'],
        ['id' => 10, 'title' => 'Hyundai Sonata', 'status' => 'sold', 'notes' => 'Recently serviced'],
        ['id' => 11, 'title' => 'Volkswagen Passat', 'status' => 'available', 'notes' => 'Spacious interior'],
        ['id' => 12, 'title' => 'Mazda 6', 'status' => 'pending', 'notes' => 'Minor scratches on bumper'],
        ['id' => 13, 'title' => 'Subaru Outback', 'status' => 'available', 'notes' => 'Great for off-road'],
        ['id' => 14, 'title' => 'Jeep Wrangler', 'status' => 'sold', 'notes' => '4x4 capabilities'],
        ['id' => 15, 'title' => 'Kia Optima', 'status' => 'available', 'notes' => 'Affordable and reliable'],
        ['id' => 16, 'title' => 'Dodge Charger', 'status' => 'pending', 'notes' => 'High performance'],
        ['id' => 17, 'title' => 'Chevrolet Tahoe', 'status' => 'available', 'notes' => 'Spacious SUV'],
        ['id' => 18, 'title' => 'GMC Sierra', 'status' => 'sold', 'notes' => 'Powerful truck'],
        ['id' => 19, 'title' => 'Ram 1500', 'status' => 'available', 'notes' => 'Towing package included'],
        ['id' => 20, 'title' => 'Lexus RX', 'status' => 'pending', 'notes' => 'Luxury SUV with features'],
    ];

    public function __invoke(Request $request)
    {
        $data = collect($this->cars);
        $search = mb_strtolower($request->get('search'));

        if (mb_strlen($search) && $search) {
            $data = $data->filter(function ($i) use ($search) {
                if (
                    Str::contains(mb_strtolower($i['id']), $search) ||
                    Str::contains(mb_strtolower($i['title']), $search) ||
                    Str::contains(mb_strtolower($i['status']), $search) ||
                    Str::contains(mb_strtolower($i['notes']), $search)
                ) {
                    return true;
                }
            });
        }

        $data = $data->toArray();

        return response()->json($data);
    }
}
