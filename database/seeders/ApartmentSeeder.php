<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use illuminate\Support\Str;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Apartment::truncate();
        Schema::enableForeignKeyConstraints();

        $home_images = [
            'https://static9.depositphotos.com/1086013/1149/i/450/depositphotos_11497591-stock-photo-superb-backyard.jpg',
            'https://st2.depositphotos.com/1370441/7847/i/450/depositphotos_78479540-stock-photo-luxury-home-with-pool-at.jpg',
            'https://st.depositphotos.com/1053646/4438/i/450/depositphotos_44386219-stock-photo-luxury-beach-resort.jpg',
            'https://static5.depositphotos.com/1040082/460/i/450/depositphotos_4601928-stock-photo-luxury-tropical-villa-garden-swimming.jpg',
            'https://static6.depositphotos.com/1005018/596/i/600/depositphotos_5961491-stock-photo-outdooroutdoor.jpg',
            'https://st.depositphotos.com/1017187/3043/i/450/depositphotos_30430657-stock-photo-luxury-home-with-a-garden.jpg',
            'https://st2.depositphotos.com/1370441/7847/i/450/depositphotos_78479454-stock-photo-luxury-home-with-pool-at.jpg',
            'https://st2.depositphotos.com/1247468/6774/i/450/depositphotos_67746161-stock-photo-modern-home-at-dusk.jpg',
            'https://st.depositphotos.com/2018053/2924/i/450/depositphotos_29246729-stock-photo-modern-villa-by-night.jpg',
            'https://st2.depositphotos.com/1672917/6935/i/450/depositphotos_69353471-stock-photo-outdoor-interior-of-modern-house.jpg',
            // 10
            'https://static6.depositphotos.com/1086013/578/i/450/depositphotos_5785967-stock-photo-resort-style-living.jpg',
            'https://static8.depositphotos.com/1392258/871/i/450/depositphotos_8716836-stock-photo-modern-gray-brick-home.jpg',
            'https://st.depositphotos.com/2763588/4023/i/450/depositphotos_40236851-stock-photo-expensive-home-against-a-blue.jpg',
            'https://static9.depositphotos.com/1086013/1149/i/450/depositphotos_11497565-stock-photo-house-interior.jpg',
            'https://st3.depositphotos.com/4676639/14962/i/600/depositphotos_149628972-free-stock-photo-two-storey-red-brick-house.jpg',
            'https://st4.depositphotos.com/20363444/29001/i/450/depositphotos_290014538-stock-photo-new-luxury-house-green-trees.jpg',
            'https://static8.depositphotos.com/1392258/871/i/450/depositphotos_8716913-stock-photo-luxury-home.jpg',
            'https://static8.depositphotos.com/1392258/871/i/450/depositphotos_8711701-stock-photo-large-luxury-brick-home.jpg',
            'https://st2.depositphotos.com/1041088/11595/i/450/depositphotos_115954550-stock-photo-home-exterior-with-garage-and.jpg',
            'https://static8.depositphotos.com/1392258/865/i/450/depositphotos_8657489-stock-photo-foyer-with-spiral-staircase.jpg',
            // 20
            'https://static9.depositphotos.com/1041088/1184/i/450/depositphotos_11842757-stock-photo-large-american-beautiful-house-with.jpg',
            'https://static9.depositphotos.com/1625039/1145/i/450/depositphotos_11458497-stock-photo-new-upscale-executive-house.jpg',
            'https://st.depositphotos.com/1068269/4045/i/450/depositphotos_40454869-stock-photo-modern-loft-and-kitchen.jpg',
            'https://st.depositphotos.com/1987395/3285/i/450/depositphotos_32856403-stock-photo-big-modern-house.jpg',
            'https://st2.depositphotos.com/3915017/9363/i/600/depositphotos_93635492-stock-photo-luxury-villa-with-swimming-pool.jpg',
            'https://static7.depositphotos.com/1041088/758/i/450/depositphotos_7589448-stock-photo-large-beige-house-with-green.jpg',
            'https://st.depositphotos.com/1086013/1984/i/450/depositphotos_19842525-stock-photo-luxurious-home-interior.jpg',
            'https://st.depositphotos.com/1370441/4624/i/450/depositphotos_46242711-stock-photo-deck-with-sunset-view.jpg',
            'https://st3.depositphotos.com/1825794/15301/i/600/depositphotos_153011108-stock-photo-contemporary-australian-home.jpg',
            'https://st2.depositphotos.com/1007034/6589/i/450/depositphotos_65897773-stock-photo-modern-house-with-pool.jpg',
            // 30
            'https://st.depositphotos.com/1247468/2229/i/450/depositphotos_22295185-stock-photo-luxurious-house.jpg',
            'https://static9.depositphotos.com/1658611/1134/i/950/depositphotos_11345228-stock-photo-suburban-house-exterior.jpg',
            'https://st.depositphotos.com/1041088/2033/i/950/depositphotos_20332523-stock-photo-large-farm-country-house-with.jpg',
            'https://st.depositphotos.com/1987395/3285/i/950/depositphotos_32856403-stock-photo-big-modern-house.jpg',
            'https://st2.depositphotos.com/1041088/5583/i/950/depositphotos_55835427-stock-photo-house-exterior-with-curb-appeal.jpg',
            'https://st2.depositphotos.com/1041088/5583/i/950/depositphotos_55835427-stock-photo-house-exterior-with-curb-appeal.jpg',
            'https://static8.depositphotos.com/1524415/1032/i/950/depositphotos_10328955-stock-photo-house-with-white-picket-fence.jpg',
            'https://static8.depositphotos.com/1004032/887/i/950/depositphotos_8875918-stock-photo-single-family-white-house.jpg',
            'https://st2.depositphotos.com/1041088/7766/i/950/depositphotos_77665926-stock-photo-large-modern-house-with-stone.jpg',
            'https://st.depositphotos.com/1041088/2033/i/950/depositphotos_20330761-stock-photo-large-farm-country-house-with.jpg',
            // 40
            'https://static7.depositphotos.com/1041088/774/i/950/depositphotos_7743917-stock-photo-covered-front-porch-of-the.jpg',
            'https://st.depositphotos.com/1041088/4081/i/950/depositphotos_40812493-stock-photo-big-house-with-beautiful-curb.jpg ',
            'https://st.depositphotos.com/1041088/4500/i/950/depositphotos_45003645-stock-photo-house-exterior-view-of-entrance.jpg',
            'https://st.depositphotos.com/1041088/4123/i/950/depositphotos_41234039-stock-photo-curb-appeal-idea.jpg',
            'https://st.depositphotos.com/1041088/3974/i/950/depositphotos_39740939-stock-photo-two-story-american-house-with.jpg',
            'https://st2.depositphotos.com/1041088/7905/i/950/depositphotos_79056084-stock-photo-elegant-entrance-to-large-american.jpg',
            'https://st2.depositphotos.com/1041088/12181/i/950/depositphotos_121814166-stock-photo-small-craftsman-one-story-exterior.jpg',
            'https://st2.depositphotos.com/1041088/5430/i/950/depositphotos_54307919-stock-photo-house-exterior-with-large-window.jpg',
            'https://st3.depositphotos.com/1041088/15491/i/1600/depositphotos_154911518-stock-photo-nice-craftsman-home-exterior-on.jpg',
            'https://st.depositphotos.com/1041088/5032/i/950/depositphotos_50323051-stock-photo-light-green-house-exterior-with.jpg',
            // 50
            'https://st2.depositphotos.com/17484154/45589/i/450/depositphotos_455897316-stock-photo-two-storied-villa-green-trees.jpg',
            'https://st2.depositphotos.com/1247468/6412/i/450/depositphotos_64122055-stock-photo-small-cottage.jpg',
            'https://st3.depositphotos.com/4933223/18835/i/450/depositphotos_188354816-stock-photo-expensive-modern-house-huge-windows.jpg',
            'https://st3.depositphotos.com/4933223/16485/i/450/depositphotos_164854746-stock-photo-expensive-modern-townhouses-with-huge.jpg',
            'https://st3.depositphotos.com/4933223/18481/i/450/depositphotos_184817886-stock-photo-expensive-old-house-huge-windows.jpg',
            'https://static9.depositphotos.com/1004757/1193/i/450/depositphotos_11935829-stock-photo-australian-house.jpg',
            'https://static8.depositphotos.com/1392258/865/i/450/depositphotos_8657675-stock-photo-foyer-with-curved-staircase.jpg',
            'https://static4.depositphotos.com/1008216/347/i/450/depositphotos_3473001-stock-photo-living-a-room-with-a.jpg', 
            'https://st.depositphotos.com/1010710/3400/i/450/depositphotos_34008939-stock-photo-house-exterior-with-sunloungers-on.jpg',
            'https://static7.depositphotos.com/1086013/753/i/450/depositphotos_7536759-stock-photo-kitchen-and-dining-area.jpg',
            // 60
            'https://st.depositphotos.com/1041088/1812/i/450/depositphotos_18123219-stock-photo-luxury-living-room-with-stobe.jpg',
            'https://static8.depositphotos.com/1009647/905/i/450/depositphotos_9052175-stock-photo-living-room.jpg',
            'https://static8.depositphotos.com/1392258/867/i/450/depositphotos_8670099-stock-photo-kitchen-with-large-island.jpg',
            'https://static9.depositphotos.com/1041088/1091/i/450/depositphotos_10919657-stock-photo-luxury-kitchen-interior-with-green.jpg',
            'https://static4.depositphotos.com/1007602/351/i/450/depositphotos_3515902-stock-photo-modern-apartment-interior-3d.jpg',
            'https://st3.depositphotos.com/2018053/15820/i/450/depositphotos_158201450-stock-photo-furnish-living-room-with-beautiful.jpg',
            'https://st3.depositphotos.com/2249091/31839/i/450/depositphotos_318393642-stock-photo-stylish-copper-colored-coffee-table.jpg',
            'https://st2.depositphotos.com/1041088/5519/i/450/depositphotos_55195603-stock-photo-luxury-house-with-open-floor.jpg', 
            'https://st2.depositphotos.com/1370441/5379/i/450/depositphotos_53796061-stock-photo-kitchen-in-modern-home.jpg',
            'https://st.depositphotos.com/1749882/2345/i/450/depositphotos_23453056-stock-photo-blue-sofa-with-colorful-pillows.jpg',
            // 70
        ];

        for ($i=0; $i < 70; $i++) {
            $new_apartment = new Apartment();
            $random_user = User::inRandomOrder()->first();
            $new_apartment->user_id = $random_user->id;
            $new_apartment->title = $faker->sentence(4, true);
            $new_apartment->rooms_num = $faker->numberBetween(3,15);
            $new_apartment->beds_num = ceil($new_apartment->rooms_num / 2);
            $new_apartment->baths_num = ceil($new_apartment->rooms_num / 3);
            $new_apartment->description = $faker->paragraph(50);
            $new_apartment->price = $faker->randomFloat(2,35,10000);
            $new_apartment->mq = ($new_apartment->rooms_num * rand(8, 20));
            $new_apartment->image = $home_images[$i];
            
            do {
                $new_apartment->latitude = $faker->latitude(35, 47);
                $new_apartment->longitude = $faker->longitude(6, 18);

                // TomTom finds addresses from latitude and longitude
                $getAddressFromCoords = Http::get("https://api.tomtom.com/search/2/reverseGeocode/crossStreet/{$new_apartment->latitude},{$new_apartment->longitude}.json?key=S7Di8WQbB2pqxqTH8RYmhO63cZwgtNgp&limit=1&radius=20000&language=NGT&allowFreeformNewline=false&view=Unified");
                $answer = $getAddressFromCoords->json();
            } while ($answer['summary']['numResults'] === 0);

            $address = $answer['addresses'][0]['address'];
            $new_apartment->full_address = $address['freeformAddress'] . ', ' . (array_key_exists('countrySubdivision', $address) ? $address['countrySubdivision'] : '') .  ', ' . $address['country'];

            $new_apartment->is_visible = $faker->boolean();

            $slug = Str::slug($new_apartment->title, '-') . '-' . Str::slug($new_apartment->full_address, '-') . '-' . Str::slug($new_apartment->user_id, '-') . '-' . $new_apartment->getNextId();
            $new_apartment->slug = $slug;
            $new_apartment->save();
        }
    }
}
