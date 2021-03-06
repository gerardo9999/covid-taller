<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePaisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            // $table->timestamps();
        });
        

        DB::table('paises')->insert(array('name' => 'Afghanistan', 'code' => 'AF')); 
        DB::table('paises')->insert(array('name' => 'Åland Islands', 'code' => 'AX')); 
        DB::table('paises')->insert(array('name' => 'Albania', 'code' => 'AL')); 
        DB::table('paises')->insert(array('name' => 'Algeria', 'code' => 'DZ')); 
        DB::table('paises')->insert(array('name' => 'American Samoa', 'code' => 'AS')); 
        DB::table('paises')->insert(array('name' => 'AndorrA', 'code' => 'AD')); 
        DB::table('paises')->insert(array('name' => 'Angola', 'code' => 'AO')); 
        DB::table('paises')->insert(array('name' => 'Anguilla', 'code' => 'AI')); 
        DB::table('paises')->insert(array('name' => 'Antarctica', 'code' => 'AQ')); 
        DB::table('paises')->insert(array('name' => 'Antigua and Barbuda', 'code' => 'AG')); 
        DB::table('paises')->insert(array('name' => 'Argentina', 'code' => 'AR')); 
        DB::table('paises')->insert(array('name' => 'Armenia', 'code' => 'AM')); 
        DB::table('paises')->insert(array('name' => 'Aruba', 'code' => 'AW')); 
        DB::table('paises')->insert(array('name' => 'Australia', 'code' => 'AU')); 
        DB::table('paises')->insert(array('name' => 'Austria', 'code' => 'AT')); 
        DB::table('paises')->insert(array('name' => 'Azerbaijan', 'code' => 'AZ')); 
        DB::table('paises')->insert(array('name' => 'Bahamas', 'code' => 'BS')); 
        DB::table('paises')->insert(array('name' => 'Bahrain', 'code' => 'BH')); 
        DB::table('paises')->insert(array('name' => 'Bangladesh', 'code' => 'BD')); 
        DB::table('paises')->insert(array('name' => 'Barbados', 'code' => 'BB')); 
        DB::table('paises')->insert(array('name' => 'Belarus', 'code' => 'BY')); 
        DB::table('paises')->insert(array('name' => 'Belgium', 'code' => 'BE')); 
        DB::table('paises')->insert(array('name' => 'Belize', 'code' => 'BZ')); 
        DB::table('paises')->insert(array('name' => 'Benin', 'code' => 'BJ')); 
        DB::table('paises')->insert(array('name' => 'Bermuda', 'code' => 'BM')); 
        DB::table('paises')->insert(array('name' => 'Bhutan', 'code' => 'BT')); 
        DB::table('paises')->insert(array('name' => 'Bolivia', 'code' => 'BO')); 
        DB::table('paises')->insert(array('name' => 'Bosnia and Herzegovina', 'code' => 'BA')); 
        DB::table('paises')->insert(array('name' => 'Botswana', 'code' => 'BW')); 
        DB::table('paises')->insert(array('name' => 'Bouvet Island', 'code' => 'BV')); 
        DB::table('paises')->insert(array('name' => 'Brazil', 'code' => 'BR')); 
        DB::table('paises')->insert(array('name' => 'British Indian Ocean Territory', 'code' => 'IO')); 
        DB::table('paises')->insert(array('name' => 'Brunei Darussalam', 'code' => 'BN')); 
        DB::table('paises')->insert(array('name' => 'Bulgaria', 'code' => 'BG')); 
        DB::table('paises')->insert(array('name' => 'Burkina Faso', 'code' => 'BF')); 
        DB::table('paises')->insert(array('name' => 'Burundi', 'code' => 'BI')); 
        DB::table('paises')->insert(array('name' => 'Cambodia', 'code' => 'KH')); 
        DB::table('paises')->insert(array('name' => 'Cameroon', 'code' => 'CM')); 
        DB::table('paises')->insert(array('name' => 'Canada', 'code' => 'CA')); 
        DB::table('paises')->insert(array('name' => 'Cape Verde', 'code' => 'CV')); 
        DB::table('paises')->insert(array('name' => 'Cayman Islands', 'code' => 'KY')); 
        DB::table('paises')->insert(array('name' => 'Central African Republic', 'code' => 'CF')); 
        DB::table('paises')->insert(array('name' => 'Chad', 'code' => 'TD')); 
        DB::table('paises')->insert(array('name' => 'Chile', 'code' => 'CL')); 
        DB::table('paises')->insert(array('name' => 'China', 'code' => 'CN')); 
        DB::table('paises')->insert(array('name' => 'Christmas Island', 'code' => 'CX')); 
        DB::table('paises')->insert(array('name' => 'Cocos (Keeling) Islands', 'code' => 'CC')); 
        DB::table('paises')->insert(array('name' => 'Colombia', 'code' => 'CO')); 
        DB::table('paises')->insert(array('name' => 'Comoros', 'code' => 'KM')); 
        DB::table('paises')->insert(array('name' => 'Congo', 'code' => 'CG')); 
        DB::table('paises')->insert(array('name' => 'Congo, The Democratic Republic of the', 'code' => 'CD')); 
        DB::table('paises')->insert(array('name' => 'Cook Islands', 'code' => 'CK')); 
        DB::table('paises')->insert(array('name' => 'Costa Rica', 'code' => 'CR')); 
        DB::table('paises')->insert(array('name' => 'Cote D\'Ivoire', 'code' => 'CI')); 
        DB::table('paises')->insert(array('name' => 'Croatia', 'code' => 'HR')); 
        DB::table('paises')->insert(array('name' => 'Cuba', 'code' => 'CU')); 
        DB::table('paises')->insert(array('name' => 'Cyprus', 'code' => 'CY')); 
        DB::table('paises')->insert(array('name' => 'Czech Republic', 'code' => 'CZ')); 
        DB::table('paises')->insert(array('name' => 'Denmark', 'code' => 'DK')); 
        DB::table('paises')->insert(array('name' => 'Djibouti', 'code' => 'DJ')); 
        DB::table('paises')->insert(array('name' => 'Dominica', 'code' => 'DM')); 
        DB::table('paises')->insert(array('name' => 'Dominican Republic', 'code' => 'DO')); 
        DB::table('paises')->insert(array('name' => 'Ecuador', 'code' => 'EC')); 
        DB::table('paises')->insert(array('name' => 'Egypt', 'code' => 'EG')); 
        DB::table('paises')->insert(array('name' => 'El Salvador', 'code' => 'SV')); 
        DB::table('paises')->insert(array('name' => 'Equatorial Guinea', 'code' => 'GQ')); 
        DB::table('paises')->insert(array('name' => 'Eritrea', 'code' => 'ER')); 
        DB::table('paises')->insert(array('name' => 'Estonia', 'code' => 'EE')); 
        DB::table('paises')->insert(array('name' => 'Ethiopia', 'code' => 'ET')); 
        DB::table('paises')->insert(array('name' => 'Falkland Islands (Malvinas)', 'code' => 'FK')); 
        DB::table('paises')->insert(array('name' => 'Faroe Islands', 'code' => 'FO')); 
        DB::table('paises')->insert(array('name' => 'Fiji', 'code' => 'FJ')); 
        DB::table('paises')->insert(array('name' => 'Finland', 'code' => 'FI')); 
        DB::table('paises')->insert(array('name' => 'France', 'code' => 'FR')); 
        DB::table('paises')->insert(array('name' => 'French Guiana', 'code' => 'GF')); 
        DB::table('paises')->insert(array('name' => 'French Polynesia', 'code' => 'PF')); 
        DB::table('paises')->insert(array('name' => 'French Southern Territories', 'code' => 'TF')); 
        DB::table('paises')->insert(array('name' => 'Gabon', 'code' => 'GA')); 
        DB::table('paises')->insert(array('name' => 'Gambia', 'code' => 'GM')); 
        DB::table('paises')->insert(array('name' => 'Georgia', 'code' => 'GE')); 
        DB::table('paises')->insert(array('name' => 'Germany', 'code' => 'DE')); 
        DB::table('paises')->insert(array('name' => 'Ghana', 'code' => 'GH')); 
        DB::table('paises')->insert(array('name' => 'Gibraltar', 'code' => 'GI')); 
        DB::table('paises')->insert(array('name' => 'Greece', 'code' => 'GR')); 
        DB::table('paises')->insert(array('name' => 'Greenland', 'code' => 'GL')); 
        DB::table('paises')->insert(array('name' => 'Grenada', 'code' => 'GD')); 
        DB::table('paises')->insert(array('name' => 'Guadeloupe', 'code' => 'GP')); 
        DB::table('paises')->insert(array('name' => 'Guam', 'code' => 'GU')); 
        DB::table('paises')->insert(array('name' => 'Guatemala', 'code' => 'GT')); 
        DB::table('paises')->insert(array('name' => 'Guernsey', 'code' => 'GG')); 
        DB::table('paises')->insert(array('name' => 'Guinea', 'code' => 'GN')); 
        DB::table('paises')->insert(array('name' => 'Guinea-Bissau', 'code' => 'GW')); 
        DB::table('paises')->insert(array('name' => 'Guyana', 'code' => 'GY')); 
        DB::table('paises')->insert(array('name' => 'Haiti', 'code' => 'HT')); 
        DB::table('paises')->insert(array('name' => 'Heard Island and Mcdonald Islands', 'code' => 'HM')); 
        DB::table('paises')->insert(array('name' => 'Holy See (Vatican City State)', 'code' => 'VA')); 
        DB::table('paises')->insert(array('name' => 'Honduras', 'code' => 'HN')); 
        DB::table('paises')->insert(array('name' => 'Hong Kong', 'code' => 'HK')); 
        DB::table('paises')->insert(array('name' => 'Hungary', 'code' => 'HU')); 
        DB::table('paises')->insert(array('name' => 'Iceland', 'code' => 'IS')); 
        DB::table('paises')->insert(array('name' => 'India', 'code' => 'IN')); 
        DB::table('paises')->insert(array('name' => 'Indonesia', 'code' => 'ID')); 
        DB::table('paises')->insert(array('name' => 'Iran, Islamic Republic Of', 'code' => 'IR')); 
        DB::table('paises')->insert(array('name' => 'Iraq', 'code' => 'IQ')); 
        DB::table('paises')->insert(array('name' => 'Ireland', 'code' => 'IE')); 
        DB::table('paises')->insert(array('name' => 'Isle of Man', 'code' => 'IM')); 
        DB::table('paises')->insert(array('name' => 'Israel', 'code' => 'IL')); 
        DB::table('paises')->insert(array('name' => 'Italy', 'code' => 'IT')); 
        DB::table('paises')->insert(array('name' => 'Jamaica', 'code' => 'JM')); 
        DB::table('paises')->insert(array('name' => 'Japan', 'code' => 'JP')); 
        DB::table('paises')->insert(array('name' => 'Jersey', 'code' => 'JE')); 
        DB::table('paises')->insert(array('name' => 'Jordan', 'code' => 'JO')); 
        DB::table('paises')->insert(array('name' => 'Kazakhstan', 'code' => 'KZ')); 
        DB::table('paises')->insert(array('name' => 'Kenya', 'code' => 'KE')); 
        DB::table('paises')->insert(array('name' => 'Kiribati', 'code' => 'KI')); 
        DB::table('paises')->insert(array('name' => 'Korea, Democratic People\'S Republic of', 'code' => 'KP')); 
        DB::table('paises')->insert(array('name' => 'Korea, Republic of', 'code' => 'KR')); 
        DB::table('paises')->insert(array('name' => 'Kuwait', 'code' => 'KW')); 
        DB::table('paises')->insert(array('name' => 'Kyrgyzstan', 'code' => 'KG')); 
        DB::table('paises')->insert(array('name' => 'Lao People\'S Democratic Republic', 'code' => 'LA')); 
        DB::table('paises')->insert(array('name' => 'Latvia', 'code' => 'LV')); 
        DB::table('paises')->insert(array('name' => 'Lebanon', 'code' => 'LB')); 
        DB::table('paises')->insert(array('name' => 'Lesotho', 'code' => 'LS')); 
        DB::table('paises')->insert(array('name' => 'Liberia', 'code' => 'LR')); 
        DB::table('paises')->insert(array('name' => 'Libyan Arab Jamahiriya', 'code' => 'LY')); 
        DB::table('paises')->insert(array('name' => 'Liechtenstein', 'code' => 'LI')); 
        DB::table('paises')->insert(array('name' => 'Lithuania', 'code' => 'LT')); 
        DB::table('paises')->insert(array('name' => 'Luxembourg', 'code' => 'LU')); 
        DB::table('paises')->insert(array('name' => 'Macao', 'code' => 'MO')); 
        DB::table('paises')->insert(array('name' => 'Macedonia, The Former Yugoslav Republic of', 'code' => 'MK')); 
        DB::table('paises')->insert(array('name' => 'Madagascar', 'code' => 'MG')); 
        DB::table('paises')->insert(array('name' => 'Malawi', 'code' => 'MW')); 
        DB::table('paises')->insert(array('name' => 'Malaysia', 'code' => 'MY')); 
        DB::table('paises')->insert(array('name' => 'Maldives', 'code' => 'MV')); 
        DB::table('paises')->insert(array('name' => 'Mali', 'code' => 'ML')); 
        DB::table('paises')->insert(array('name' => 'Malta', 'code' => 'MT')); 
        DB::table('paises')->insert(array('name' => 'Marshall Islands', 'code' => 'MH')); 
        DB::table('paises')->insert(array('name' => 'Martinique', 'code' => 'MQ')); 
        DB::table('paises')->insert(array('name' => 'Mauritania', 'code' => 'MR')); 
        DB::table('paises')->insert(array('name' => 'Mauritius', 'code' => 'MU')); 
        DB::table('paises')->insert(array('name' => 'Mayotte', 'code' => 'YT')); 
        DB::table('paises')->insert(array('name' => 'Mexico', 'code' => 'MX')); 
        DB::table('paises')->insert(array('name' => 'Micronesia, Federated States of', 'code' => 'FM')); 
        DB::table('paises')->insert(array('name' => 'Moldova, Republic of', 'code' => 'MD')); 
        DB::table('paises')->insert(array('name' => 'Monaco', 'code' => 'MC')); 
        DB::table('paises')->insert(array('name' => 'Mongolia', 'code' => 'MN')); 
        DB::table('paises')->insert(array('name' => 'Montserrat', 'code' => 'MS')); 
        DB::table('paises')->insert(array('name' => 'Morocco', 'code' => 'MA')); 
        DB::table('paises')->insert(array('name' => 'Mozambique', 'code' => 'MZ')); 
        DB::table('paises')->insert(array('name' => 'Myanmar', 'code' => 'MM')); 
        DB::table('paises')->insert(array('name' => 'Namibia', 'code' => 'NA')); 
        DB::table('paises')->insert(array('name' => 'Nauru', 'code' => 'NR')); 
        DB::table('paises')->insert(array('name' => 'Nepal', 'code' => 'NP')); 
        DB::table('paises')->insert(array('name' => 'Netherlands', 'code' => 'NL')); 
        DB::table('paises')->insert(array('name' => 'Netherlands Antilles', 'code' => 'AN')); 
        DB::table('paises')->insert(array('name' => 'New Caledonia', 'code' => 'NC')); 
        DB::table('paises')->insert(array('name' => 'New Zealand', 'code' => 'NZ')); 
        DB::table('paises')->insert(array('name' => 'Nicaragua', 'code' => 'NI')); 
        DB::table('paises')->insert(array('name' => 'Niger', 'code' => 'NE')); 
        DB::table('paises')->insert(array('name' => 'Nigeria', 'code' => 'NG')); 
        DB::table('paises')->insert(array('name' => 'Niue', 'code' => 'NU')); 
        DB::table('paises')->insert(array('name' => 'Norfolk Island', 'code' => 'NF')); 
        DB::table('paises')->insert(array('name' => 'Northern Mariana Islands', 'code' => 'MP')); 
        DB::table('paises')->insert(array('name' => 'Norway', 'code' => 'NO')); 
        DB::table('paises')->insert(array('name' => 'Oman', 'code' => 'OM')); 
        DB::table('paises')->insert(array('name' => 'Pakistan', 'code' => 'PK')); 
        DB::table('paises')->insert(array('name' => 'Palau', 'code' => 'PW')); 
        DB::table('paises')->insert(array('name' => 'Palestinian Territory, Occupied', 'code' => 'PS')); 
        DB::table('paises')->insert(array('name' => 'Panama', 'code' => 'PA')); 
        DB::table('paises')->insert(array('name' => 'Papua New Guinea', 'code' => 'PG')); 
        DB::table('paises')->insert(array('name' => 'Paraguay', 'code' => 'PY')); 
        DB::table('paises')->insert(array('name' => 'Peru', 'code' => 'PE')); 
        DB::table('paises')->insert(array('name' => 'Philippines', 'code' => 'PH')); 
        DB::table('paises')->insert(array('name' => 'Pitcairn', 'code' => 'PN')); 
        DB::table('paises')->insert(array('name' => 'Poland', 'code' => 'PL')); 
        DB::table('paises')->insert(array('name' => 'Portugal', 'code' => 'PT')); 
        DB::table('paises')->insert(array('name' => 'Puerto Rico', 'code' => 'PR')); 
        DB::table('paises')->insert(array('name' => 'Qatar', 'code' => 'QA')); 
        DB::table('paises')->insert(array('name' => 'Reunion', 'code' => 'RE')); 
        DB::table('paises')->insert(array('name' => 'Romania', 'code' => 'RO')); 
        DB::table('paises')->insert(array('name' => 'Russian Federation', 'code' => 'RU')); 
        DB::table('paises')->insert(array('name' => 'RWANDA', 'code' => 'RW')); 
        DB::table('paises')->insert(array('name' => 'Saint Helena', 'code' => 'SH')); 
        DB::table('paises')->insert(array('name' => 'Saint Kitts and Nevis', 'code' => 'KN')); 
        DB::table('paises')->insert(array('name' => 'Saint Lucia', 'code' => 'LC')); 
        DB::table('paises')->insert(array('name' => 'Saint Pierre and Miquelon', 'code' => 'PM')); 
        DB::table('paises')->insert(array('name' => 'Saint Vincent and the Grenadines', 'code' => 'VC')); 
        DB::table('paises')->insert(array('name' => 'Samoa', 'code' => 'WS')); 
        DB::table('paises')->insert(array('name' => 'San Marino', 'code' => 'SM')); 
        DB::table('paises')->insert(array('name' => 'Sao Tome and Principe', 'code' => 'ST')); 
        DB::table('paises')->insert(array('name' => 'Saudi Arabia', 'code' => 'SA')); 
        DB::table('paises')->insert(array('name' => 'Senegal', 'code' => 'SN')); 
        DB::table('paises')->insert(array('name' => 'Serbia and Montenegro', 'code' => 'CS')); 
        DB::table('paises')->insert(array('name' => 'Seychelles', 'code' => 'SC')); 
        DB::table('paises')->insert(array('name' => 'Sierra Leone', 'code' => 'SL')); 
        DB::table('paises')->insert(array('name' => 'Singapore', 'code' => 'SG')); 
        DB::table('paises')->insert(array('name' => 'Slovakia', 'code' => 'SK')); 
        DB::table('paises')->insert(array('name' => 'Slovenia', 'code' => 'SI')); 
        DB::table('paises')->insert(array('name' => 'Solomon Islands', 'code' => 'SB')); 
        DB::table('paises')->insert(array('name' => 'Somalia', 'code' => 'SO')); 
        DB::table('paises')->insert(array('name' => 'South Africa', 'code' => 'ZA')); 
        DB::table('paises')->insert(array('name' => 'South Georgia and the South Sandwich Islands', 'code' => 'GS')); 
        DB::table('paises')->insert(array('name' => 'Spain', 'code' => 'ES')); 
        DB::table('paises')->insert(array('name' => 'Sri Lanka', 'code' => 'LK')); 
        DB::table('paises')->insert(array('name' => 'Sudan', 'code' => 'SD')); 
        DB::table('paises')->insert(array('name' => 'Suriname', 'code' => 'SR')); 
        DB::table('paises')->insert(array('name' => 'Svalbard and Jan Mayen', 'code' => 'SJ')); 
        DB::table('paises')->insert(array('name' => 'Swaziland', 'code' => 'SZ')); 
        DB::table('paises')->insert(array('name' => 'Sweden', 'code' => 'SE')); 
        DB::table('paises')->insert(array('name' => 'Switzerland', 'code' => 'CH')); 
        DB::table('paises')->insert(array('name' => 'Syrian Arab Republic', 'code' => 'SY')); 
        DB::table('paises')->insert(array('name' => 'Taiwan, Province of China', 'code' => 'TW')); 
        DB::table('paises')->insert(array('name' => 'Tajikistan', 'code' => 'TJ')); 
        DB::table('paises')->insert(array('name' => 'Tanzania, United Republic of', 'code' => 'TZ')); 
        DB::table('paises')->insert(array('name' => 'Thailand', 'code' => 'TH')); 
        DB::table('paises')->insert(array('name' => 'Timor-Leste', 'code' => 'TL')); 
        DB::table('paises')->insert(array('name' => 'Togo', 'code' => 'TG')); 
        DB::table('paises')->insert(array('name' => 'Tokelau', 'code' => 'TK')); 
        DB::table('paises')->insert(array('name' => 'Tonga', 'code' => 'TO')); 
        DB::table('paises')->insert(array('name' => 'Trinidad and Tobago', 'code' => 'TT')); 
        DB::table('paises')->insert(array('name' => 'Tunisia', 'code' => 'TN')); 
        DB::table('paises')->insert(array('name' => 'Turkey', 'code' => 'TR')); 
        DB::table('paises')->insert(array('name' => 'Turkmenistan', 'code' => 'TM')); 
        DB::table('paises')->insert(array('name' => 'Turks and Caicos Islands', 'code' => 'TC')); 
        DB::table('paises')->insert(array('name' => 'Tuvalu', 'code' => 'TV')); 
        DB::table('paises')->insert(array('name' => 'Uganda', 'code' => 'UG')); 
        DB::table('paises')->insert(array('name' => 'Ukraine', 'code' => 'UA')); 
        DB::table('paises')->insert(array('name' => 'United Arab Emirates', 'code' => 'AE')); 
        DB::table('paises')->insert(array('name' => 'United Kingdom', 'code' => 'GB')); 
        DB::table('paises')->insert(array('name' => 'United States', 'code' => 'US')); 
        DB::table('paises')->insert(array('name' => 'United States Minor Outlying Islands', 'code' => 'UM')); 
        DB::table('paises')->insert(array('name' => 'Uruguay', 'code' => 'UY')); 
        DB::table('paises')->insert(array('name' => 'Uzbekistan', 'code' => 'UZ')); 
        DB::table('paises')->insert(array('name' => 'Vanuatu', 'code' => 'VU')); 
        DB::table('paises')->insert(array('name' => 'Venezuela', 'code' => 'VE')); 
        DB::table('paises')->insert(array('name' => 'Viet Nam', 'code' => 'VN')); 
        DB::table('paises')->insert(array('name' => 'Virgin Islands, British', 'code' => 'VG')); 
        DB::table('paises')->insert(array('name' => 'Virgin Islands, U.S.', 'code' => 'VI')); 
        DB::table('paises')->insert(array('name' => 'Wallis and Futuna', 'code' => 'WF')); 
        DB::table('paises')->insert(array('name' => 'Western Sahara', 'code' => 'EH')); 
        DB::table('paises')->insert(array('name' => 'Yemen', 'code' => 'YE')); 
        DB::table('paises')->insert(array('name' => 'Zambia', 'code' => 'ZM')); 
        DB::table('paises')->insert(array('name' => 'Zimbabwe', 'code' => 'ZW'));
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paises');
    }
}
