<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->truncate();
        DB::table('blogs')->insert([
            [
                'title' => 'Welcome to YourCompany - The Best Rent a Car Service',
                'content' => "Are you looking for a reliable and affordable car rental service? Look no further! At YourCompany, we pride ourselves on providing top-notch vehicles and excellent customer service to make your journey smooth and enjoyable. Whether you're planning a business trip, a family vacation, or need a temporary replacement for your car, we've got you covered.

Why Choose Us?
Wide Range of Vehicles:
We offer a diverse fleet of vehicles to cater to your specific needs. From compact cars for city driving to spacious SUVs for family trips, we have it all. Our vehicles are well-maintained and regularly serviced to ensure safety and comfort.

Affordable Rates:
We understand the importance of budget-friendly options. Our competitive pricing ensures that you get the best value for your money without compromising on quality. We also offer special discounts and promotions to make our services even more affordable.

Flexible Rental Options:
Whether you need a car for a day, a week, or a month, we provide flexible rental plans to suit your schedule. Our easy booking process allows you to reserve a vehicle in just a few clicks.

24/7 Customer Support:
Our dedicated customer support team is available around the clock to assist you with any queries or concerns. We are committed to ensuring your rental experience is hassle-free and enjoyable.

Convenient Locations:
With multiple pick-up and drop-off locations, renting a car has never been easier. We strive to provide convenient and accessible services to meet your travel needs.

Our Services
Business Rentals:
Need a car for a business trip? We offer premium vehicles that are perfect for making a great impression. Enjoy the convenience of our corporate rental services with flexible terms and competitive rates.

Family Vacations:
Planning a family getaway? Our spacious and comfortable SUVs and minivans are ideal for long trips with plenty of luggage space. Travel in style and comfort with your loved ones.

Special Occasions:
Make your special day even more memorable with our luxury car rentals. Whether it's a wedding, anniversary, or any other celebration, we have the perfect car to add a touch of elegance to your event.

Airport Transfers:
Arriving at or departing from the airport? Our airport transfer service ensures a smooth and timely ride to your destination. Avoid the hassle of taxis and public transportation with our reliable airport shuttle service.

Long-Term Rentals:
If you need a vehicle for an extended period, our long-term rental options are perfect for you. Enjoy the benefits of having a car without the commitment of ownership.
                ",
                'featured_image' => 'blog_gEQ9gzbx.png',
                'author_id' => '1',
                'category_id' => '1',
                'is_deleted' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Discover YourCompany - Your Ultimate Car Rental Solution',
                'content' => "Welcome to YourCompany, your go-to car rental service for all your travel needs. Whether you're hitting the road for business, leisure, or any special occasion, we have the perfect vehicle for you. At YourCompany, we are committed to delivering top-quality cars, exceptional customer service, and unbeatable prices to ensure a seamless and enjoyable rental experience.

Why YourCompany Stands Out
Extensive Fleet of Vehicles:
At YourCompany, we boast a diverse selection of vehicles to meet every requirement. From compact cars for city drives to luxury sedans and spacious SUVs for family vacations, our fleet is meticulously maintained and ready to roll.

Competitive Pricing:
We believe in offering value for money. Our competitive rental rates are designed to fit any budget, without compromising on quality. Keep an eye out for our special deals and discounts for even greater savings.

Flexible Rental Periods:
Need a car for a day, a week, or a month? No problem! Our flexible rental options allow you to choose the duration that suits your plans. Enjoy the freedom to rent on your terms.

24/7 Customer Service:
Our dedicated customer support team is available around the clock to assist you with any questions or concerns. At YourCompany, we prioritize your satisfaction and are always here to help.

Convenient Locations:
With multiple pick-up and drop-off locations, renting a car from YourCompany is convenient and hassle-free. We strive to make your rental experience as smooth as possible.
                ",
                'featured_image' => 'blog_gEQ9gzbx.png',
                'author_id' => '1',
                'category_id' => '1',
                'is_deleted' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Experience Premium Car Rentals with YourCompany',
                'content' => "YourCompany, your trusted partner for all your car rental needs. Whether you're planning a weekend getaway, a business trip, or need a reliable car for daily use, YourCompany offers a seamless and enjoyable rental experience. Discover why our customers choose us for their car rental needs time and time again.

Why Choose YourCompany?
Diverse Fleet Selection:
Our extensive fleet includes a variety of vehicles to suit your specific needs. From fuel-efficient compact cars to luxurious sedans and spacious SUVs, all our vehicles are well-maintained and ready for your journey.

Affordable Rates:
We offer competitive pricing to ensure you get the best value for your money. With our transparent pricing policy, there are no hidden fees, and you can take advantage of our special deals and discounts.

Flexible Rental Options:
Whether you need a car for a day, a week, or a month, we have flexible rental plans to fit your schedule. Our user-friendly booking system makes it easy to reserve a vehicle in just a few minutes.

Excellent Customer Service:
Our customer service team is available 24/7 to assist you with any questions or concerns. We are dedicated to providing a smooth and hassle-free rental experience from start to finish.

Convenient Locations:
With multiple pick-up and drop-off locations, YourCompany makes renting a car convenient and accessible. Wherever you are, we have a location nearby to serve you.

Our Services
Business Rentals:
Impress your clients and colleagues with our premium vehicles. Our business rental services offer flexibility, convenience, and competitive rates, ensuring your business trips are comfortable and efficient.

Family Vacations:
Make your family trips memorable with our spacious and comfortable SUVs and minivans. Enjoy ample space for luggage and a smooth ride for the whole family.

Special Events:
Celebrate in style with our luxury car rentals. Whether it's a wedding, anniversary, or any other special occasion, YourCompany has the perfect car to make your event unforgettable.

Airport Transfers:
Experience a hassle-free journey to and from the airport with our reliable airport transfer service. Avoid the stress of taxis and public transportation with our punctual and comfortable rides.

Long-Term Rentals:
For extended travel or temporary needs, our long-term rental options provide an economical and convenient solution. Enjoy the benefits of a personal vehicle without the long-term commitment.",
                'featured_image' => 'blog_gEQ9gzbx.png',
                'author_id' => '1',
                'category_id' => '1',
                'is_deleted' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Your Premier Car Rental Service',
                'content' => "At YourCompany, we understand that renting a car should be easy, convenient, and affordable. That's why we offer a seamless car rental experience tailored to your unique needs. Whether you're traveling for business, planning a family vacation, or need a car for a special occasion, YourCompany is here to provide you with top-quality vehicles and exceptional service.

Why Rent with YourCompany?
Extensive Vehicle Selection:
We offer a diverse range of vehicles, including economy cars, luxury sedans, spacious SUVs, and vans. All our vehicles are meticulously maintained and equipped with the latest features to ensure your comfort and safety.

Unbeatable Prices:
Our competitive pricing means you can enjoy high-quality car rentals without breaking the bank. We offer transparent pricing with no hidden fees, and our special promotions and discounts provide even greater value.

Flexible Rental Options:
Whether you need a car for a day, a week, or an extended period, YourCompany offers flexible rental plans to suit your schedule. Our straightforward booking process makes it easy to reserve a car that fits your needs.

Exceptional Customer Service:
Our dedicated customer support team is available 24/7 to assist you with any questions or concerns. From booking to drop-off, we strive to provide a smooth and hassle-free rental experience.

Convenient Locations:
With multiple pick-up and drop-off locations, YourCompany makes it easy to rent a car wherever you are. Our convenient locations ensure that you're never far from a YourCompany rental center.

Our Services
Corporate Rentals:
Enhance your business travel with our premium vehicles and flexible corporate rental options. Impress clients and colleagues with our stylish and comfortable cars, designed to meet the demands of business travel.

Family Vacations:
Enjoy a memorable family vacation with our range of spacious and comfortable vehicles. Our SUVs and minivans provide ample room for luggage and passengers, ensuring a smooth and enjoyable trip for the whole family.

Luxury Rentals for Special Occasions:
Celebrate in style with our luxury car rentals. Perfect for weddings, anniversaries, and other special events, our high-end vehicles add a touch of elegance and sophistication to any occasion.

Airport Transfers:
Simplify your travel with our reliable airport transfer service. Avoid the hassle of taxis and public transportation with our punctual and comfortable rides, ensuring a stress-free journey to and from the airport.
                ",
                'featured_image' => 'blog_gEQ9gzbx.png',
                'author_id' => '1',
                'category_id' => '1',
                'is_deleted' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
