<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->truncate();
        DB::table('countries')->insert([
            [
                'name' => 'Afghanistan',
                'phonecode' => '93',
                'emoji' => '🇦🇫',
            ],
            [
                'name' => 'Albania',
                'phonecode' => '355',
                'emoji' => '🇦🇱',
            ],
            [
                'name' => 'Algeria',
                'phonecode' => '213',
                'emoji' => '🇩🇿',
            ],
            [
                'name' => 'Andorra',
                'phonecode' => '376',
                'emoji' => '🇦🇩',
            ],
            [
                'name' => 'Angola',
                'phonecode' => '244',
                'emoji' => '🇦🇴',
            ],
            [
                'name' => 'Antigua and Barbuda',
                'phonecode' => '+1-268',
                'emoji' => '🇦🇬',
            ],
            [
                'name' => 'Argentina',
                'phonecode' => '54',
                'emoji' => '🇦🇷',
            ],
            [
                'name' => 'Armenia',
                'phonecode' => '374',
                'emoji' => '🇦🇲',
            ],
            [
                'name' => 'Australia',
                'phonecode' => '61',
                'emoji' => '🇦🇺',
            ],
            [
                'name' => 'Austria',
                'phonecode' => '43',
                'emoji' => '🇦🇹',
            ],
            [
                'name' => 'Azerbaijan',
                'phonecode' => '994',
                'emoji' => '🇦🇿',
            ],
            [
                'name' => 'Bahamas',
                'phonecode' => '+1-242',
                'emoji' => '🇧🇸',
            ],
            [
                'name' => 'Bahrain',
                'phonecode' => '973',
                'emoji' => '🇧🇭',
            ],
            [
                'name' => 'Bangladesh',
                'phonecode' => '880',
                'emoji' => '🇧🇩',
            ],
            [
                'name' => 'Barbados',
                'phonecode' => '+1-246',
                'emoji' => '🇧🇧',
            ],
            [
                'name' => 'Belarus',
                'phonecode' => '375',
                'emoji' => '🇧🇾',
            ],
            [
                'name' => 'Belgium',
                'phonecode' => '32',
                'emoji' => '🇧🇪',
            ],
            [
                'name' => 'Belize',
                'phonecode' => '501',
                'emoji' => '🇧🇿',
            ],
            [
                'name' => 'Benin',
                'phonecode' => '229',
                'emoji' => '🇧🇯',
            ],
            [
                'name' => 'Bhutan',
                'phonecode' => '975',
                'emoji' => '🇧🇹',
            ],
            [
                'name' => 'Bolivia',
                'phonecode' => '591',
                'emoji' => '🇧🇴',
            ],
            [
                'name' => 'Bosnia and Herzegovina',
                'phonecode' => '387',
                'emoji' => '🇧🇦',
            ],
            [
                'name' => 'Botswana',
                'phonecode' => '267',
                'emoji' => '🇧🇼',
            ],
            [
                'name' => 'Brazil',
                'phonecode' => '55',
                'emoji' => '🇧🇷',
            ],
            [
                'name' => 'Brunei',
                'phonecode' => '673',
                'emoji' => '🇧🇳',
            ],
            [
                'name' => 'Bulgaria',
                'phonecode' => '359',
                'emoji' => '🇧🇬',
            ],
            [
                'name' => 'Burkina Faso',
                'phonecode' => '226',
                'emoji' => '🇧🇫',
            ],
            [
                'name' => 'Burundi',
                'phonecode' => '257',
                'emoji' => '🇧🇮',
            ],
            [
                'name' => 'Cambodia',
                'phonecode' => '855',
                'emoji' => '🇰🇭',
            ],
            [
                'name' => 'Cameroon',
                'phonecode' => '237',
                'emoji' => '🇨🇲',
            ],
            [
                'name' => 'Canada',
                'phonecode' => '1',
                'emoji' => '🇨🇦',
            ],
            [
                'name' => 'Cape Verde',
                'phonecode' => '238',
                'emoji' => '🇨🇻',
            ],
            [
                'name' => 'Central African Republic',
                'phonecode' => '236',
                'emoji' => '🇨🇫',
            ],
            [
                'name' => 'Chad',
                'phonecode' => '235',
                'emoji' => '🇹🇩',
            ],
            [
                'name' => 'Chile',
                'phonecode' => '56',
                'emoji' => '🇨🇱',
            ],
            [
                'name' => 'China',
                'phonecode' => '86',
                'emoji' => '🇨🇳',
            ],
            [
                'name' => 'Colombia',
                'phonecode' => '57',
                'emoji' => '🇨🇴',
            ],
            [
                'name' => 'Comoros',
                'phonecode' => '269',
                'emoji' => '🇰🇲',
            ],
            [
                'name' => 'Congo',
                'phonecode' => '242',
                'emoji' => '🇨🇬',
            ],
            [
                'name' => 'Costa Rica',
                'phonecode' => '506',
                'emoji' => '🇨🇷',
            ],
            [
                'name' => 'Croatia',
                'phonecode' => '385',
                'emoji' => '🇭🇷',
            ],
            [
                'name' => 'Cuba',
                'phonecode' => '53',
                'emoji' => '🇨🇺',
            ],
            [
                'name' => 'Cyprus',
                'phonecode' => '357',
                'emoji' => '🇨🇾',
            ],
            [
                'name' => 'Czech Republic',
                'phonecode' => '420',
                'emoji' => '🇨🇿',
            ],
            [
                'name' => 'Denmark',
                'phonecode' => '45',
                'emoji' => '🇩🇰',
            ],
            [
                'name' => 'Djibouti',
                'phonecode' => '253',
                'emoji' => '🇩🇯',
            ],
            [
                'name' => 'Dominica',
                'phonecode' => '+1-767',
                'emoji' => '🇩🇲',
            ],
            [
                'name' => 'Dominican Republic',
                'phonecode' => '+1-809',
                'emoji' => '🇩🇴',
            ],
            [
                'name' => 'East Timor',
                'phonecode' => '670',
                'emoji' => '🇹🇱',
            ],
            [
                'name' => 'Ecuador',
                'phonecode' => '593',
                'emoji' => '🇪🇨',
            ],
            [
                'name' => 'Egypt',
                'phonecode' => '20',
                'emoji' => '🇪🇬',
            ],
            [
                'name' => 'El Salvador',
                'phonecode' => '503',
                'emoji' => '🇸🇻',
            ],
            [
                'name' => 'Equatorial Guinea',
                'phonecode' => '240',
                'emoji' => '🇬🇶',
            ],
            [
                'name' => 'Eritrea',
                'phonecode' => '291',
                'emoji' => '🇪🇷',
            ],
            [
                'name' => 'Estonia',
                'phonecode' => '372',
                'emoji' => '🇪🇪',
            ],
            [
                'name' => 'Ethiopia',
                'phonecode' => '251',
                'emoji' => '🇪🇹',
            ],
            [
                'name' => 'Fiji',
                'phonecode' => '679',
                'emoji' => '🇫🇯',
            ],
            [
                'name' => 'Finland',
                'phonecode' => '358',
                'emoji' => '🇫🇮',
            ],
            [
                'name' => 'France',
                'phonecode' => '33',
                'emoji' => '🇫🇷',
            ],
            [
                'name' => 'Gabon',
                'phonecode' => '241',
                'emoji' => '🇬🇦',
            ],
            [
                'name' => 'Gambia',
                'phonecode' => '220',
                'emoji' => '🇬🇲',
            ],
            [
                'name' => 'Georgia',
                'phonecode' => '995',
                'emoji' => '🇬🇪',
            ],
            [
                'name' => 'Germany',
                'phonecode' => '49',
                'emoji' => '🇩🇪',
            ],
            [
                'name' => 'Ghana',
                'phonecode' => '233',
                'emoji' => '🇬🇭',
            ],
            [
                'name' => 'Greece',
                'phonecode' => '30',
                'emoji' => '🇬🇷',
            ],
            [
                'name' => 'Grenada',
                'phonecode' => '+1-473',
                'emoji' => '🇬🇩',
            ],
            [
                'name' => 'Guatemala',
                'phonecode' => '502',
                'emoji' => '🇬🇹',
            ],
            [
                'name' => 'Guinea',
                'phonecode' => '224',
                'emoji' => '🇬🇳',
            ],
            [
                'name' => 'Guinea-Bissau',
                'phonecode' => '245',
                'emoji' => '🇬🇼',
            ],
            [
                'name' => 'Guyana',
                'phonecode' => '592',
                'emoji' => '🇬🇾',
            ],
            [
                'name' => 'Haiti',
                'phonecode' => '509',
                'emoji' => '🇭🇹',
            ],
            [
                'name' => 'Honduras',
                'phonecode' => '504',
                'emoji' => '🇭🇳',
            ],
            [
                'name' => 'Hungary',
                'phonecode' => '36',
                'emoji' => '🇭🇺',
            ],
            [
                'name' => 'Iceland',
                'phonecode' => '354',
                'emoji' => '🇮🇸',
            ],
            [
                'name' => 'India',
                'phonecode' => '91',
                'emoji' => '🇮🇳',
            ],
            [
                'name' => 'Indonesia',
                'phonecode' => '62',
                'emoji' => '🇮🇩',
            ],
            [
                'name' => 'Iran',
                'phonecode' => '98',
                'emoji' => '🇮🇷',
            ],
            [
                'name' => 'Iraq',
                'phonecode' => '964',
                'emoji' => '🇮🇶',
            ],
            [
                'name' => 'Ireland',
                'phonecode' => '353',
                'emoji' => '🇮🇪',
            ],
            [
                'name' => 'Israel',
                'phonecode' => '972',
                'emoji' => '🇮🇱',
            ],
            [
                'name' => 'Italy',
                'phonecode' => '39',
                'emoji' => '🇮🇹',
            ],
            [
                'name' => 'Ivory Coast',
                'phonecode' => '225',
                'emoji' => '🇨🇮',
            ],
            [
                'name' => 'Jamaica',
                'phonecode' => '+1-876',
                'emoji' => '🇯🇲',
            ],
            [
                'name' => 'Japan',
                'phonecode' => '81',
                'emoji' => '🇯🇵',
            ],
            [
                'name' => 'Jordan',
                'phonecode' => '962',
                'emoji' => '🇯🇴',
            ],
            [
                'name' => 'Kazakhstan',
                'phonecode' => '7',
                'emoji' => '🇰🇿',
            ],
            [
                'name' => 'Kenya',
                'phonecode' => '254',
                'emoji' => '🇰🇪',
            ],
            [
                'name' => 'Kiribati',
                'phonecode' => '686',
                'emoji' => '🇰🇮',
            ],
            [
                'name' => 'Kuwait',
                'phonecode' => '965',
                'emoji' => '🇰🇼',
            ],
            [
                'name' => 'Kyrgyzstan',
                'phonecode' => '996',
                'emoji' => '🇰🇬',
            ],
            [
                'name' => 'Laos',
                'phonecode' => '856',
                'emoji' => '🇱🇦',
            ],
            [
                'name' => 'Latvia',
                'phonecode' => '371',
                'emoji' => '🇱🇻',
            ],
            [
                'name' => 'Lebanon',
                'phonecode' => '961',
                'emoji' => '🇱🇧',
            ],
            [
                'name' => 'Lesotho',
                'phonecode' => '266',
                'emoji' => '🇱🇸',
            ],
            [
                'name' => 'Liberia',
                'phonecode' => '231',
                'emoji' => '🇱🇷',
            ],
            [
                'name' => 'Libya',
                'phonecode' => '218',
                'emoji' => '🇱🇾',
            ],
            [
                'name' => 'Liechtenstein',
                'phonecode' => '423',
                'emoji' => '🇱🇮',
            ],
            [
                'name' => 'Lithuania',
                'phonecode' => '370',
                'emoji' => '🇱🇹',
            ],
            [
                'name' => 'Luxembourg',
                'phonecode' => '352',
                'emoji' => '🇱🇺',
            ],
            [
                'name' => 'Madagascar',
                'phonecode' => '261',
                'emoji' => '🇲🇬',
            ],
            [
                'name' => 'Malawi',
                'phonecode' => '265',
                'emoji' => '🇲🇼',
            ],
            [
                'name' => 'Malaysia',
                'phonecode' => '60',
                'emoji' => '🇲🇾',
            ],
            [
                'name' => 'Maldives',
                'phonecode' => '960',
                'emoji' => '🇲🇻',
            ],
            [
                'name' => 'Mali',
                'phonecode' => '223',
                'emoji' => '🇲🇱',
            ],
            [
                'name' => 'Malta',
                'phonecode' => '356',
                'emoji' => '🇲🇹',
            ],
            [
                'name' => 'Marshall Islands',
                'phonecode' => '692',
                'emoji' => '🇲🇭',
            ],
            [
                'name' => 'Mauritania',
                'phonecode' => '222',
                'emoji' => '🇲🇷',
            ],
            [
                'name' => 'Mauritius',
                'phonecode' => '230',
                'emoji' => '🇲🇺',
            ],
            [
                'name' => 'Mexico',
                'phonecode' => '52',
                'emoji' => '🇲🇽',
            ],
            [
                'name' => 'Micronesia',
                'phonecode' => '691',
                'emoji' => '🇫🇲',
            ],
            [
                'name' => 'Moldova',
                'phonecode' => '373',
                'emoji' => '🇲🇩',
            ],
            [
                'name' => 'Monaco',
                'phonecode' => '377',
                'emoji' => '🇲🇨',
            ],
            [
                'name' => 'Mongolia',
                'phonecode' => '976',
                'emoji' => '🇲🇳',
            ],
            [
                'name' => 'Montenegro',
                'phonecode' => '382',
                'emoji' => '🇲🇪',
            ],
            [
                'name' => 'Morocco',
                'phonecode' => '212',
                'emoji' => '🇲🇦',
            ],
            [
                'name' => 'Mozambique',
                'phonecode' => '258',
                'emoji' => '🇲🇿',
            ],
            [
                'name' => 'Myanmar',
                'phonecode' => '95',
                'emoji' => '🇲🇲',
            ],
            [
                'name' => 'Namibia',
                'phonecode' => '264',
                'emoji' => '🇳🇦',
            ],
            [
                'name' => 'Nauru',
                'phonecode' => '674',
                'emoji' => '🇳🇷',
            ],
            [
                'name' => 'Nepal',
                'phonecode' => '977',
                'emoji' => '🇳🇵',
            ],
            [
                'name' => 'Netherlands',
                'phonecode' => '31',
                'emoji' => '🇳🇱',
            ],
            [
                'name' => 'New Zealand',
                'phonecode' => '64',
                'emoji' => '🇳🇿',
            ],
            [
                'name' => 'Nicaragua',
                'phonecode' => '505',
                'emoji' => '🇳🇮',
            ],
            [
                'name' => 'Niger',
                'phonecode' => '227',
                'emoji' => '🇳🇪',
            ],
            [
                'name' => 'Nigeria',
                'phonecode' => '234',
                'emoji' => '🇳🇬',
            ],
            [
                'name' => 'North Korea',
                'phonecode' => '850',
                'emoji' => '🇰🇵',
            ],
            [
                'name' => 'Norway',
                'phonecode' => '47',
                'emoji' => '🇳🇴',
            ],
            [
                'name' => 'Oman',
                'phonecode' => '968',
                'emoji' => '🇴🇲',
            ],
            [
                'name' => 'Pakistan',
                'phonecode' => '92',
                'emoji' => '🇵🇰',
            ],
            [
                'name' => 'Palau',
                'phonecode' => '680',
                'emoji' => '🇵🇼',
            ],
            [
                'name' => 'Palestine',
                'phonecode' => '970',
                'emoji' => '🇵🇸',
            ],
            [
                'name' => 'Panama',
                'phonecode' => '507',
                'emoji' => '🇵🇦',
            ],
            [
                'name' => 'Papua New Guinea',
                'phonecode' => '675',
                'emoji' => '🇵🇬',
            ],
            [
                'name' => 'Paraguay',
                'phonecode' => '595',
                'emoji' => '🇵🇾',
            ],
            [
                'name' => 'Peru',
                'phonecode' => '51',
                'emoji' => '🇵🇪',
            ],
            [
                'name' => 'Philippines',
                'phonecode' => '63',
                'emoji' => '🇵🇭',
            ],
            [
                'name' => 'Poland',
                'phonecode' => '48',
                'emoji' => '🇵🇱',
            ],
            [
                'name' => 'Portugal',
                'phonecode' => '351',
                'emoji' => '🇵🇹',
            ],
            [
                'name' => 'Qatar',
                'phonecode' => '974',
                'emoji' => '🇶🇦',
            ],
            [
                'name' => 'Republic of the Congo',
                'phonecode' => '242',
                'emoji' => '🇨🇬',
            ],
            [
                'name' => 'Romania',
                'phonecode' => '40',
                'emoji' => '🇷🇴',
            ],
            [
                'name' => 'Russia',
                'phonecode' => '7',
                'emoji' => '🇷🇺',
            ],
            [
                'name' => 'Rwanda',
                'phonecode' => '250',
                'emoji' => '🇷🇼',
            ],
            [
                'name' => 'Saint Kitts and Nevis',
                'phonecode' => '+1-869',
                'emoji' => '🇰🇳',
            ],
            [
                'name' => 'Saint Lucia',
                'phonecode' => '+1-758',
                'emoji' => '🇱🇨',
            ],
            [
                'name' => 'Saint Vincent and the Grenadines',
                'phonecode' => '+1-784',
                'emoji' => '🇻🇨',
            ],
            [
                'name' => 'Samoa',
                'phonecode' => '685',
                'emoji' => '🇼🇸',
            ],
            [
                'name' => 'San Marino',
                'phonecode' => '378',
                'emoji' => '🇸🇲',
            ],
            [
                'name' => 'Sao Tome and Principe',
                'phonecode' => '239',
                'emoji' => '🇸🇹',
            ],
            [
                'name' => 'Saudi Arabia',
                'phonecode' => '966',
                'emoji' => '🇸🇦',
            ],
            [
                'name' => 'Senegal',
                'phonecode' => '221',
                'emoji' => '🇸🇳',
            ],
            [
                'name' => 'Serbia',
                'phonecode' => '381',
                'emoji' => '🇷🇸',
            ],
            [
                'name' => 'Seychelles',
                'phonecode' => '248',
                'emoji' => '🇸🇨',
            ],
            [
                'name' => 'Sierra Leone',
                'phonecode' => '232',
                'emoji' => '🇸🇱',
            ],
            [
                'name' => 'Singapore',
                'phonecode' => '65',
                'emoji' => '🇸🇬',
            ],
            [
                'name' => 'Slovakia',
                'phonecode' => '421',
                'emoji' => '🇸🇰',
            ],
            [
                'name' => 'Slovenia',
                'phonecode' => '386',
                'emoji' => '🇸🇮',
            ],
            [
                'name' => 'Solomon Islands',
                'phonecode' => '677',
                'emoji' => '🇸🇧',
            ],
            [
                'name' => 'Somalia',
                'phonecode' => '252',
                'emoji' => '🇸🇴',
            ],
            [
                'name' => 'South Africa',
                'phonecode' => '27',
                'emoji' => '🇿🇦',
            ],
            [
                'name' => 'South Korea',
                'phonecode' => '82',
                'emoji' => '🇰🇷',
            ],
            [
                'name' => 'South Sudan',
                'phonecode' => '211',
                'emoji' => '🇸🇸',
            ],
            [
                'name' => 'Spain',
                'phonecode' => '34',
                'emoji' => '🇪🇸',
            ],
            [
                'name' => 'Sri Lanka',
                'phonecode' => '94',
                'emoji' => '🇱🇰',
            ],
            [
                'name' => 'Sudan',
                'phonecode' => '249',
                'emoji' => '🇸🇩',
            ],
            [
                'name' => 'Suriname',
                'phonecode' => '597',
                'emoji' => '🇸🇷',
            ],
            [
                'name' => 'Sweden',
                'phonecode' => '46',
                'emoji' => '🇸🇪',
            ],
            [
                'name' => 'Switzerland',
                'phonecode' => '41',
                'emoji' => '🇨🇭',
            ],
            [
                'name' => 'Syria',
                'phonecode' => '963',
                'emoji' => '🇸🇾',
            ],
            [
                'name' => 'Taiwan',
                'phonecode' => '886',
                'emoji' => '🇹🇼',
            ],
            [
                'name' => 'Tajikistan',
                'phonecode' => '992',
                'emoji' => '🇹🇯',
            ],
            [
                'name' => 'Tanzania',
                'phonecode' => '255',
                'emoji' => '🇹🇿',
            ],
            [
                'name' => 'Thailand',
                'phonecode' => '66',
                'emoji' => '🇹🇭',
            ],
            [
                'name' => 'Timor-Leste',
                'phonecode' => '670',
                'emoji' => '🇹🇱',
            ],
            [
                'name' => 'Togo',
                'phonecode' => '228',
                'emoji' => '🇹🇬',
            ],
            [
                'name' => 'Tonga',
                'phonecode' => '676',
                'emoji' => '🇹🇴',
            ],
            [
                'name' => 'Trinidad and Tobago',
                'phonecode' => '+1-868',
                'emoji' => '🇹🇹',
            ],
            [
                'name' => 'Tunisia',
                'phonecode' => '216',
                'emoji' => '🇹🇳',
            ],
            [
                'name' => 'Turkey',
                'phonecode' => '90',
                'emoji' => '🇹🇷',
            ],
            [
                'name' => 'Turkmenistan',
                'phonecode' => '993',
                'emoji' => '🇹🇲',
            ],
            [
                'name' => 'Tuvalu',
                'phonecode' => '688',
                'emoji' => '🇹🇻',
            ],
            [
                'name' => 'Uganda',
                'phonecode' => '256',
                'emoji' => '🇺🇬',
            ],
            [
                'name' => 'Ukraine',
                'phonecode' => '380',
                'emoji' => '🇺🇦',
            ],
            [
                'name' => 'United Arab Emirates',
                'phonecode' => '971',
                'emoji' => '🇦🇪',
            ],
            [
                'name' => 'United Kingdom',
                'phonecode' => '44',
                'emoji' => '🇬🇧',
            ],
            [
                'name' => 'United States',
                'phonecode' => '1',
                'emoji' => '🇺🇸',
            ],
            [
                'name' => 'Uruguay',
                'phonecode' => '598',
                'emoji' => '🇺🇾',
            ],
            [
                'name' => 'Uzbekistan',
                'phonecode' => '998',
                'emoji' => '🇺🇿',
            ],
            [
                'name' => 'Vanuatu',
                'phonecode' => '678',
                'emoji' => '🇻🇺',
            ],
            [
                'name' => 'Vatican City',
                'phonecode' => '379',
                'emoji' => '🇻🇦',
            ],
            [
                'name' => 'Venezuela',
                'phonecode' => '58',
                'emoji' => '🇻🇪',
            ],
            [
                'name' => 'Vietnam',
                'phonecode' => '84',
                'emoji' => '🇻🇳',
            ],
            [
                'name' => 'Yemen',
                'phonecode' => '967',
                'emoji' => '🇾🇪',
            ],
            [
                'name' => 'Zambia',
                'phonecode' => '260',
                'emoji' => '🇿🇲',
            ],
            [
                'name' => 'Zimbabwe',
                'phonecode' => '263',
                'emoji' => '🇿🇼',
            ],
        ]);
    }
}
