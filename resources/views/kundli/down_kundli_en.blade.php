<!doctype html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staarae</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="https://fonts.googleapis.com/css?family=poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <style>
        body {
            font-family: "poppins";
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table td,
        table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }


        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            color: #000;
        }

        h3 {
            margin-bottom: 6px;
            margin-top: 10px;
        }

        td {
            border: none;
        }

        p {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <table style="background-color: #fff; width: 100%;margin: 0 auto;">
        <tbody>
            <tr>
                <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                    <h3>Basic Details</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td><b>Name</b></td>
                                <td> {{ isset($customer->name) ? $customer->name : 'N/A' }} </td>
                                <td><b>Date of birth</b></td>
                                <td>{{ isset($customer->dob) ? get_default_format($customer->dob) : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><b>Time of birth</b></td>
                                <td>{{ isset($customer->birthDetail->hour) ? $customer->birthDetail->hour . ':' .
                                    $customer->birthDetail->minute . ':00' : 'N/A' }}</td>
                                <td><b>Place of birth</b></td>
                                <td> {{ isset($customer->pob) ? $customer->pob : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><b>Gender</b></td>
                                <td> {{ isset($customer->gender) ? $customer->gender : 'N/A' }}</td>
                                <td><b>Day</b></td>
                                <td>{{ isset($customer->dob) ? date('l', strtotime($customer->dob)) : 'Na' }}</td>
                            </tr>
                            <tr>
                                <td><b>Timezone</b></td>
                                <td>{{ isset($customer->birthDetail->tzone) ? $customer->birthDetail->tzone : 'Na' }}
                                </td>
                                <td><b>Latitude</b></td>
                                <td> {{ isset($customer->birthDetail->lat) ?
                                    convertFullDegree($customer->birthDetail->lat) : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><b>Longitude</b></td>
                                <td> {{ isset($customer->birthDetail->lon) ?
                                    convertFullDegree($customer->birthDetail->lon) : 'N/A' }}</td>
                                <td><b>Sunrise</b></td>
                                <td>{{ isset($customer->birthDetail->sunrise) ? $customer->birthDetail->sunrise : 'N/A'
                                    }}</td>
                            </tr>
                            <tr>
                                <td><b>Sunset</b></td>
                                <td>{{ isset($customer->birthDetail->sunset) ? $customer->birthDetail->sunset : 'N/A' }}
                                </td>
                                <td><b>Ayanamsha</b></td>
                                <td>{{ isset($customer->birthDetail->ayanamsha) ? $customer->birthDetail->ayanamsha :
                                    'N/A' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    @if ($customer->userGems->count() > 0)
        @foreach ($customer->userGems as $key => $user_gem)
        <table style="width: 100%;margin: 0 auto;">
            <tbody>
                <tr>
                    <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                        <h3>{{ isset($user_gem->gem_type) ? $user_gem->gem_type . ' STONE' : null }}</h3>
                        <div>
                            <img alt="Gem image" src="{{ isset($user_gem->gem->image) ? $user_gem->gem->image : 'Image' }}">
                        </div>
                        <table>
                            <tbody>
                                <tr>
                                    <td><b>Stone</b></td>
                                    <td> {{ isset($user_gem->gem->name) ? $user_gem->gem->name : 'Na' }}</td>
                                    <td><b>Gem key</b></td>
                                    <td>{{ isset($user_gem->gem->gem_key) ? $user_gem->gem->gem_key : 'Na' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Semi-Gem</b></td>
                                    <td>{{ isset($user_gem->semi_gem) ? $user_gem->semi_gem : 'Na' }}</td>
                                    <td><b>Finger</b></td>
                                    <td>{{ isset($user_gem->wear_finger) ? $user_gem->wear_finger : 'Na' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Weight</b></td>
                                    <td> {{ isset($user_gem->weight_caret) ? $user_gem->weight_caret : 'Na' }}</td>
                                    <td><b>Metal</b></td>
                                    <td>{{ isset($user_gem->wear_metal) ? $user_gem->wear_metal : 'Na' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Day to wear</b></td>
                                    <td> {{ isset($user_gem->wear_day) ? $user_gem->wear_day : 'Na' }}</td>
                                    <td><b>Gem Deity</b></td>
                                    <td>{{ isset($user_gem->gem_deity) ? $user_gem->gem_deity : 'Na' }}</td>
                                </tr>
                            </tbody>
                            <h3 style="color: #ff4f70;">Stone description</h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td><b>Basic information</b></td>
                                        <td> {{ isset($user_gem->gem->basic_information) ? $user_gem->gem->basic_information
                                            : 'Na' }}</td>
                                        <td><b>Time to wear</b></td>
                                        <td> {{ isset($user_gem->gem->time_to_wear) ? $user_gem->gem->time_to_wear : 'Na' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Energizing Rituals</b></td>
                                        <td> {{ isset($user_gem->gem->energizing_rituals) ?
                                            $user_gem->gem->energizing_rituals : 'Na' }}</td>
                                        <td><b>Mantra</b></td>
                                        <td> {{ isset($user_gem->gem->mantra) ? $user_gem->gem->mantra : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Stone Wear Mantra</b></td>
                                        <td> {{ isset($user_gem->gem->wear_mantra) ? $user_gem->gem->wear_mantra : 'Na' }}
                                        </td>
                                        <td><b>Caution!</b></td>
                                        <td>{{ isset($user_gem->gem->caution) ? $user_gem->gem->caution : 'Na' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                    </td>
                </tr>
            </tbody>
        </table>
        @endforeach
    @endif

    @if (isset($customer->numerology))
    <table style="background-color: #fff; width: 100%;margin: 0 auto;">
        <tbody>
            <tr>
                <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                    <h3>Number</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <h5 style="font-size: 22px;margin: 0px;"> {{ isset($customer->numerology->destiny_number) ? $customer->numerology->destiny_number : 'Na' }}</h5>
                                    <p style="margin: 8px 0px;">Destiny Number</p>
                                </td>
                                <td>
                                    <h5 style="font-size: 22px;margin: 0px;">{{ isset($customer->numerology->radical_number) ? $customer->numerology->radical_number : 'Na' }}</h5>
                                    <p style="margin: 8px 0px;">Radical Number</p>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <h5 style="font-size: 22px;margin: 0px;">{{ isset($customer->numerology->name_number) ? $customer->numerology->name_number : 'Na' }}</h5>
                                    <p style="margin: 8px 0px;">Name Number</p>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Favourable Mantra</b></td>
                                <td colspan="3">{{ isset($customer->numerology->fav_mantra) ? $customer->numerology->fav_mantra : 'Na' }}</td>
                            </tr>
                            <tr>
                                <td><b>Name</b></td>
                                <td>{{ isset($customer->numerology->name) ? $customer->numerology->name : 'Na' }}</td>
                                <td><b>Birth Date</b></td>
                                <td> {{ isset($customer->dob) ? get_default_format($customer->dob) : 'Na' }}</td>
                            </tr>
                            <tr>     
                                <td><b>Evil Number</b></td>
                                <td> {{ isset($customer->numerology->evil_num) ? $customer->numerology->evil_num : 'Na' }}</td>
                                <td><b>Favourable Color</b></td>
                                <td> {{ isset($customer->numerology->fav_color) ? $customer->numerology->fav_color : 'Na' }}</td>
                            </tr>
                  
                            <tr>         
                                <td><b>Favourable Day</b></td>
                                <td>{{ isset($customer->numerology->fav_day) ? $customer->numerology->fav_day : 'Na' }}</td>
                                <td><b>Favourable God</b></td>
                                <td> {{ isset($customer->numerology->fav_god) ? $customer->numerology->fav_god : 'Na' }}</td>
                            </tr>
           
                            <tr>       
                                <td><b>Destiny Number</b></td>
                                <td> {{ isset($customer->numerology->destiny_number) ? $customer->numerology->destiny_number : 'Na' }}</td>
                                <td><b>Favourable Metal</b></td>
                                <td> {{ isset($customer->numerology->fav_metal) ? $customer->numerology->fav_metal : 'Na' }}</td>
                            </tr>
          
                            <tr>     
                                <td><b>Favourable Stone</b></td>
                                <td> {{ isset($customer->numerology->fav_stone) ? $customer->numerology->fav_stone : 'Na' }}</td>
                                <td><b>Favourable Sub Stone</b></td>
                                <td> {{ isset($customer->numerology->fav_substone) ? $customer->numerology->fav_substone : 'Na' }}</td>
                            </tr>
  
                            <tr>
                                <td><b>Friendly Number</b></td>
                                <td>  {{ isset($customer->numerology->friendly_num) ? $customer->numerology->friendly_num : 'Na' }}</td>
                                <td><b>Neutral Number</b></td>
                                <td>  {{ isset($customer->numerology->neutral_num) ? $customer->numerology->neutral_num : 'Na' }}</td>
                            </tr>

                            <tr>     
                                <td><b>Radical Ruler</b></td>
                                <td> {{ isset($customer->numerology->radical_ruler) ? $customer->numerology->radical_ruler : 'Na' }}</td>
                                <td><b>Radical Number</b></td>
                                <td> {{ isset($customer->numerology->radical_num) ? $customer->numerology->radical_num : 'Na' }}</td>
                            </tr>

                            <tr>     
                                <td><b>Name Number</b></td>
                                <td> {{ isset($customer->numerology->name_number) ? $customer->numerology->name_number : 'Na' }}</td>
                                <td><b></b></td>
                                <td> </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    @endif

    @if (isset($customer->chakra))
    @php
                    $chakras = isset($customer->chakra->percentages) ? json_decode($customer->chakra->percentages) : null;
                @endphp
    <table style="background-color: #fff; width: 100%;margin: 0 auto;">
        <tbody>
            <tr>
                <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                   <h3>Chakra</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Name
                                    </th>
                                    <th scope="col">
                                        Percentage
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="border:none; padding: 0px;width: 60px;">
                                                        <img src="https://i.ibb.co/d2hwr8N/muladhara.png" alt="muladhara" width="44px" style="float: left;">
                                                    </td>
                                                    <td style="border:none;padding: 0px;">
                                                        <h5 style="font-size: 18px;margin: 0px;">Muladhara</h5>
                                                        <p style="margin: 0px;">Root</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>    
                                    </td>
                                    <td>
                                        {{ isset($chakras->muladhar) ? $chakras->muladhar . '%' : 'Na' }}
                                    </td>
                                </tr>
                                <tr style="background-color: transparent;">
                                    <td scope="row">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="border:none; padding: 0px;width: 60px;">
                                                        <img src="https://i.ibb.co/rs26Gtb/svadhishthana.png" alt="svadhishthana" width="44px" style="float: left;"> 
                                                    </td>
                                                    <td style="border:none;padding: 0px;">
                                                        <h5 style="font-size: 18px;margin: 0px;">Swadhishthana</h5>
                                                        <p style="margin: 0px;">Sacral</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        {{ isset($chakras->svadhishthan) ? $chakras->svadhishthan . '%' : 'Na' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="border:none; padding: 0px;width: 60px;">
                                                        <img src="https://i.ibb.co/T0sgjCh/manipura.png" alt="manipura" width="44px" style="float: left;">
                                                    </td>
                                                    <td style="border:none;padding: 0px;">
                                                        <h5 style="font-size: 18px;margin: 0px;">Manipura</h5>
                                                        <p style="margin: 0px;">Solar Plexus</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        {{ isset($chakras->manipura) ? $chakras->manipura . '%' : 'Na' }}
                                    </td>
                                </tr>
                                <tr style="background-color: transparent;">
                                    <td scope="row">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="border:none; padding: 0px;width: 60px;">
                                                        <img src="https://i.ibb.co/HTL5Yvf/anahata.png" alt="anahata" width="44px" style="float: left;">
                                                    </td>
                                                    <td style="border:none;padding: 0px;">
                                                        <h5 style="font-size: 18px;margin: 0px;">Anahata</h5>
                                                        <p style="margin: 0px;">Heart</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        {{ isset($chakras->anahata) ? $chakras->anahata . '%' : 'Na' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="border:none; padding: 0px;width: 60px;">
                                                        <img src="https://i.ibb.co/mBWTFKk/vishuddha.png" alt="vishuddha" width="44px" style="float: left;">
                                                    </td>
                                                    <td style="border:none;padding: 0px;">
                                                        <h5 style="font-size: 18px;margin: 0px;">Vishuddha</h5>
                                                        <p style="margin: 0px;">Throat</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        {{ isset($chakras->vishuddha) ? $chakras->vishuddha . '%' : 'Na' }}
                                    </td>
                                </tr>
                                <tr style="background-color: transparent;">
                                    <td scope="row">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="border:none; padding: 0px;width: 60px;">
                                                        <img src="https://i.ibb.co/DfSQtbj/ajna.png" alt="ajna" width="44px" style="float: left;">
                                                    </td>
                                                    <td style="border:none;padding: 0px;">
                                                        <h5 style="font-size: 18px;margin: 0px;">Ajna</h5>
                                                        <p style="margin: 0px;">Third Eye</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        {{ isset($chakras->ajna) ? $chakras->ajna . '%' : 'Na' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="border:none; padding: 0px;width: 60px;">
                                                        <img src="https://i.ibb.co/dM1M74z/sahasrara.png" alt="sahasrara" width="44px" style="float: left;">
                                                    </td>
                                                    <td style="border:none;padding: 0px;">
                                                        <h5 style="font-size: 18px;margin: 0px;">Sahasrara</h5>
                                                        <p style="margin: 0px;">Crown</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        {{ isset($chakras->sahasrara) ? $chakras->sahasrara . '%' : 'Na' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="background-color: #fff; width: 100%;margin: 0 auto;">
        <tbody>
            <tr>
                <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                    <h3 style="font-size: 22px;">About Chakras</h3>
                    <p style="margin-top: 8px;">
                        {{ isset($customer->chakra->about) ? $customer->chakra->about : 'Na' }}
                    </p>

                    <h3 style="font-size: 22px;">  {{ isset($customer->chakra->dominant) ? $customer->chakra->dominant : 'Na' }}</h3>
                    <p style="margin-top: 8px;">
                        {{ isset($customer->chakra->report) ? $customer->chakra->report : 'Na' }}
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    @endif
    <h2 style="margin-top: 44px;margin-bottom: 8px;">Vedic Kundli</h2>
    @if (isset($customer->astroDetail))
        @if ($customer->astroDetail->count() > 0)
            @php
                $astro_detail = $customer->astroDetail;
            @endphp
            <table style="background-color: #fff; width: 100%;margin: 0 auto;">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                            <h4 style="margin: 0px 0px 6px 0px; font-size: 18px;">Astro Details</h4>
                            <table>
                                <tbody>
                                    <tr>
                                        <td><b>Ascendant</b></td>
                                        <td> {{ isset($astro_detail->ascendant) ? $astro_detail->ascendant : 'N/A' }}</td>
                                        <td><b>Varna</b></td>
                                        <td> {{ isset($astro_detail->varna) ? $astro_detail->varna : 'N/A' }}</td>
                                        <td><b>Vashya</b></td>
                                        <td> {{ isset($astro_detail->vashya) ? $astro_detail->vashya : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Yoni</b></td>
                                        <td>  {{ isset($astro_detail->yoni) ? $astro_detail->yoni : 'N/A' }}</td>
                                        <td><b>Gan</b></td>
                                        <td> {{ isset($astro_detail->gan) ? $astro_detail->gan : 'N/A' }}</td>
                                        <td><b>Nadi</b></td>
                                        <td> {{ isset($astro_detail->nadi) ? $astro_detail->nadi : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Sign lord</b></td>
                                        <td> {{ isset($astro_detail->sign_lord) ? $astro_detail->sign_lord : 'N/A' }}</td>
                                        <td><b>Sign</b></td>
                                        <td> {{ isset($astro_detail->sign) ? $astro_detail->sign : 'N/A' }}</td>
                                        <td><b>Naksahtra</b></td>
                                        <td> {{ isset($astro_detail->naksahtra) ? $astro_detail->naksahtra : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Naksahtra lord</b></td>
                                        <td> {{ isset($astro_detail->naksahtraLord) ? $astro_detail->naksahtraLord : 'N/A' }}</td>
                                        <td><b>Charan</b></td>
                                        <td> {{ isset($astro_detail->charan) ? $astro_detail->charan : 'N/A' }}</td>
                                        <td><b>Yog</b></td>
                                        <td> {{ isset($astro_detail->yog) ? $astro_detail->yog : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Karan</b></td>
                                        <td> {{ isset($astro_detail->karan) ? $astro_detail->karan : 'N/A' }}</td>
                                        <td><b>Tithi</b></td>
                                        <td>  {{ isset($astro_detail->tithi) ? $astro_detail->tithi : 'N/A' }}</td>
                                        <td><b>Yunja</b></td>
                                        <td> {{ isset($astro_detail->yunja) ? $astro_detail->yunja : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Tatva</b></td>
                                        <td> {{ isset($astro_detail->tatva) ? $astro_detail->tatva : 'N/A' }}</td>
                                        <td><b>Name alphabet</b></td>
                                        <td> {{ isset($astro_detail->name_alphabet) ? $astro_detail->name_alphabet : 'N/A' }}</td>
                                        <td><b>Paya</b></td>
                                        <td> {{ isset($astro_detail->paya) ? $astro_detail->paya : 'N/A' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif
    @endif
    @if (isset($chart_categories))
        @if ($chart_categories->count() > 0)
            <table style="background-color: #fff; width: 100%;margin: 0 auto;">
                <tbody>
                    <tr>
                        <td colspan="2" style="border:none; padding-left: 20px;padding-right: 20px;">
                            <h2 style="margin-bottom: 8px;margin-top: 44px;">Charts</h2>
                        </td>
                    </tr>
                    @foreach ($chart_categories as $key => $chart_category)
                    @php
                    $tr_count = null;
                    if($key % 2 != 0){
                        $tr_count = 1;
                    }
                        $chart_image = $chart_category->horoChartImage($customer->id, $chart_category->key);
                    @endphp
                        @if(!isset($tr_count))
                            <tr style="background-color: transparent;">
                        @endif
                                <td style="border:none;padding-{{isset($tr_count) ? 'right' : 'left'}}: 20px;">
                                    <h4 style="margin-bottom: 0px; margin-top: 0px;">{{isset($chart_category->name) ? $chart_category->name : 'Na'}}</h4>
                                    <img width="250px"
                                        src="{{isset($chart_image->image_url) ? $chart_image->image_url  : imageNotFoundUrl()}}">
                                </td>
                        @if(isset($tr_count))
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
    @endif
    
    @if ($ashtakvarga_planates->count() > 0)
        <h2 style="margin-bottom: 0px;">Ashtakvarga</h2>
        <p style="margin-top: 0px;">Ashtakvarga is used to determine and fine tune the prediction accuracies based on Dasha and Transit forecasts. 4 or lesser are considered not good whereas more than 4 points are favorable.</p>
        @foreach ($ashtakvarga_planates as $ashtakvarga_planet)
            @php
                $ash_plant = json_decode($ashtakvarga_planet->ashtak_points);
                $ashtak_varga = json_decode($ashtakvarga_planet->ashtak_varga);
                $aries_point = $ash_plant->aries;
                $taurus_point = $ash_plant->taurus;
                $gemini_point = $ash_plant->gemini;
                $cancer_point = $ash_plant->cancer;
                $leo_point = $ash_plant->leo;
                $virgo_point = $ash_plant->virgo;
                $libra_point = $ash_plant->libra;
                $scorpio_point = $ash_plant->scorpio;
                $sagittarius_point = $ash_plant->sagittarius;
                $capricorn_point = $ash_plant->capricorn;
                $aquarius_point = $ash_plant->aquarius;
                $pisces_point = $ash_plant->pisces;
            @endphp
            <table style="background-color: #fff; width: 100%;margin: 0 auto;">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                        <h4 style="font-size: 22px;margin-bottom: 0px;margin-top: 12px;"><h4>{{ isset($ashtakvarga_planet->planet_name) ? $ashtakvarga_planet->planet_name : 'Na' }}</h4></h4>
                            <table>
                                <tbody>
                                    <tr>
                                        <td><b>Type</b></td>
                                        <td>{{ isset($ashtak_varga->type) ? $ashtak_varga->type : 'Na' }}</td>
                                        <td><b>Planet</b></td>
                                        <td>{{ isset($ashtak_varga->planet) ? $ashtak_varga->planet : 'Na' }}</td>
                                    </tr>
                                    <tr style="background-color: transparent;">
                                        <td><b>Sign</b></td>
                                        <td>{{ isset($ashtak_varga->sign) ? $ashtak_varga->sign : 'Na' }}</td>
                                        <td><b>Sign id</b></td>
                                        <td>{{ isset($ashtak_varga->sign_id) ? $ashtak_varga->sign_id : 'Na' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h5 style="font-size: 18px;margin-bottom: 6px;margin-top: 12px;">Ashtak Points {{ isset($ashtakvarga_planet->planet_name) ? '('.$ashtakvarga_planet->planet_name .')' : '' }}</h5>
                            <table>
                                <thead>
                                    <tr>
                                        <td> </td>
                                        <td><b>Sun</b></td>
                                        <td><b>Moon</b></td>
                                        <td><b>Mars</b></td>
                                        <td><b>Mercury</b></td>
                                        <td><b>Jupiter</b></td>
                                        <td><b>Venus</b></td>
                                        <td><b>Saturn</b></td>
                                        <td><b>Ascendant</b></td>
                                        <td><b>Total</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <td><b>Aries</b></td>
                                        <td>{{ isset($aries_point->sun) ? $aries_point->sun : 'Na' }}</td>
                                        <td>{{ isset($aries_point->moon) ? $aries_point->moon : 'Na' }}</td>
                                        <td>{{ isset($aries_point->mars) ? $aries_point->mars : 'Na' }}</td>
                                        <td>{{ isset($aries_point->mercury) ? $aries_point->mercury : 'Na' }}</td>
                                        <td>{{ isset($aries_point->jupiter) ? $aries_point->jupiter : 'Na' }}</td>
                                        <td>{{ isset($aries_point->venus) ? $aries_point->venus : 'Na' }}</td>
                                        <td>{{ isset($aries_point->saturn) ? $aries_point->saturn : 'Na' }}</td>
                                        <td>{{ isset($aries_point->ascendant) ? $aries_point->ascendant : 'Na' }}</td>
                                        <td>{{ isset($aries_point->total) ? $aries_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Taurus</b></td>
                                        <td>{{ isset($taurus_point->sun) ? $taurus_point->sun : 'Na' }}</td>
                                        <td>{{ isset($taurus_point->moon) ? $taurus_point->moon : 'Na' }}</td>
                                        <td>{{ isset($taurus_point->mars) ? $taurus_point->mars : 'Na' }}</td>
                                        <td>{{ isset($taurus_point->mercury) ? $taurus_point->mercury : 'Na' }}</td>
                                        <td>{{ isset($taurus_point->jupiter) ? $taurus_point->jupiter : 'Na' }}</td>
                                        <td>{{ isset($taurus_point->venus) ? $taurus_point->venus : 'Na' }}</td>
                                        <td>{{ isset($taurus_point->saturn) ? $taurus_point->saturn : 'Na' }}</td>
                                        <td>{{ isset($taurus_point->ascendant) ? $taurus_point->ascendant : 'Na' }}</td>
                                        <td>{{ isset($taurus_point->total) ? $taurus_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Gemini</b></td>
                                        <td>{{ isset($gemini_point->sun) ? $gemini_point->sun : 'Na' }}</td>
                                        <td>{{ isset($gemini_point->moon) ? $gemini_point->moon : 'Na' }}</td>
                                        <td>{{ isset($gemini_point->mars) ? $gemini_point->mars : 'Na' }}</td>
                                        <td>{{ isset($gemini_point->mercury) ? $gemini_point->mercury : 'Na' }}</td>
                                        <td>{{ isset($gemini_point->jupiter) ? $gemini_point->jupiter : 'Na' }}</td>
                                        <td>{{ isset($gemini_point->venus) ? $gemini_point->venus : 'Na' }}</td>
                                        <td>{{ isset($gemini_point->saturn) ? $gemini_point->saturn : 'Na' }}</td>
                                        <td>{{ isset($gemini_point->ascendant) ? $gemini_point->ascendant : 'Na' }}</td>
                                        <td>{{ isset($gemini_point->total) ? $gemini_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Cancer</b></td>
                                        <td>{{ isset($cancer_point->sun) ? $cancer_point->sun : 'Na' }}</td>
                                        <td>{{ isset($cancer_point->moon) ? $cancer_point->moon : 'Na' }}</td>
                                        <td>{{ isset($cancer_point->mars) ? $cancer_point->mars : 'Na' }}</td>
                                        <td>{{ isset($cancer_point->mercury) ? $cancer_point->mercury : 'Na' }}</td>
                                        <td>{{ isset($cancer_point->jupiter) ? $cancer_point->jupiter : 'Na' }}</td>
                                        <td>{{ isset($cancer_point->venus) ? $cancer_point->venus : 'Na' }}</td>
                                        <td>{{ isset($cancer_point->saturn) ? $cancer_point->saturn : 'Na' }}</td>
                                        <td>{{ isset($cancer_point->ascendant) ? $cancer_point->ascendant : 'Na' }}</td>
                                        <td>{{ isset($cancer_point->total) ? $cancer_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Leo</b></td>
                                        <td>{{ isset($leo_point->sun) ? $leo_point->sun : 'Na' }}</td>
                                        <td>{{ isset($leo_point->moon) ? $leo_point->moon : 'Na' }}</td>
                                        <td>{{ isset($leo_point->mars) ? $leo_point->mars : 'Na' }}</td>
                                        <td>{{ isset($leo_point->mercury) ? $leo_point->mercury : 'Na' }}</td>
                                        <td>{{ isset($leo_point->jupiter) ? $leo_point->jupiter : 'Na' }}</td>
                                        <td>{{ isset($leo_point->venus) ? $leo_point->venus : 'Na' }}</td>
                                        <td>{{ isset($leo_point->saturn) ? $leo_point->saturn : 'Na' }}</td>
                                        <td>{{ isset($leo_point->ascendant) ? $leo_point->ascendant : 'Na' }}</td>
                                        <td>{{ isset($leo_point->total) ? $leo_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Virgo</b></td>
                                        <td>{{ isset($virgo_point->sun) ? $virgo_point->sun : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->moon) ? $virgo_point->moon : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->mars) ? $virgo_point->mars : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->mercury) ? $virgo_point->mercury : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->jupiter) ? $virgo_point->jupiter : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->venus) ? $virgo_point->venus : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->saturn) ? $virgo_point->saturn : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->ascendant) ? $virgo_point->ascendant : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->total) ? $virgo_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Libra</b></td>
                                        <td>{{ isset($libra_point->sun) ? $libra_point->sun : 'Na' }}</td>
                                        <td>{{ isset($libra_point->moon) ? $libra_point->moon : 'Na' }}</td>
                                        <td>{{ isset($libra_point->mars) ? $libra_point->mars : 'Na' }}</td>
                                        <td>{{ isset($libra_point->mercury) ? $libra_point->mercury : 'Na' }}</td>
                                        <td>{{ isset($libra_point->jupiter) ? $libra_point->jupiter : 'Na' }}</td>
                                        <td>{{ isset($libra_point->venus) ? $libra_point->venus : 'Na' }}</td>
                                        <td>{{ isset($libra_point->saturn) ? $libra_point->saturn : 'Na' }}</td>
                                        <td>{{ isset($libra_point->ascendant) ? $libra_point->ascendant : 'Na' }}</td>
                                        <td>{{ isset($libra_point->total) ? $libra_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Scorpio</b></td>
                                        <td>{{ isset($scorpio_point->sun) ? $scorpio_point->sun : 'Na' }}</td>
                                        <td>{{ isset($scorpio_point->moon) ? $scorpio_point->moon : 'Na' }}</td>
                                        <td>{{ isset($scorpio_point->mars) ? $scorpio_point->mars : 'Na' }}</td>
                                        <td>{{ isset($scorpio_point->mercury) ? $scorpio_point->mercury : 'Na' }}</td>
                                        <td>{{ isset($scorpio_point->jupiter) ? $scorpio_point->jupiter : 'Na' }}</td>
                                        <td>{{ isset($scorpio_point->venus) ? $scorpio_point->venus : 'Na' }}</td>
                                        <td>{{ isset($scorpio_point->saturn) ? $scorpio_point->saturn : 'Na' }}</td>
                                        <td>{{ isset($scorpio_point->ascendant) ? $scorpio_point->ascendant : 'Na' }}</td>
                                        <td>{{ isset($scorpio_point->total) ? $scorpio_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Sagittarius</b></td>
                                        <td>{{ isset($sagittarius_point->sun) ? $sagittarius_point->sun : 'Na' }}</td>
                                        <td>{{ isset($sagittarius_point->moon) ? $sagittarius_point->moon : 'Na' }}</td>
                                        <td>{{ isset($sagittarius_point->mars) ? $sagittarius_point->mars : 'Na' }}</td>
                                        <td>{{ isset($sagittarius_point->mercury) ? $sagittarius_point->mercury : 'Na' }}</td>
                                        <td>{{ isset($sagittarius_point->jupiter) ? $sagittarius_point->jupiter : 'Na' }}</td>
                                        <td>{{ isset($sagittarius_point->venus) ? $sagittarius_point->venus : 'Na' }}</td>
                                        <td>{{ isset($sagittarius_point->saturn) ? $sagittarius_point->saturn : 'Na' }}</td>
                                        <td>{{ isset($sagittarius_point->ascendant) ? $sagittarius_point->ascendant : 'Na' }}</td>
                                        <td>{{ isset($sagittarius_point->total) ? $sagittarius_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Capricorn</b></td>
                                        <td>{{ isset($capricorn_point->sun) ? $capricorn_point->sun : 'Na' }}</td>
                                        <td>{{ isset($capricorn_point->moon) ? $capricorn_point->moon : 'Na' }}</td>
                                        <td>{{ isset($capricorn_point->mars) ? $capricorn_point->mars : 'Na' }}</td>
                                        <td>{{ isset($capricorn_point->mercury) ? $capricorn_point->mercury : 'Na' }}</td>
                                        <td>{{ isset($capricorn_point->jupiter) ? $capricorn_point->jupiter : 'Na' }}</td>
                                        <td>{{ isset($capricorn_point->venus) ? $capricorn_point->venus : 'Na' }}</td>
                                        <td>{{ isset($capricorn_point->saturn) ? $capricorn_point->saturn : 'Na' }}</td>
                                        <td>{{ isset($capricorn_point->ascendant) ? $capricorn_point->ascendant : 'Na' }}</td>
                                        <td>{{ isset($capricorn_point->total) ? $capricorn_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Aquarius</b></td>
                                        <td>{{ isset($aquarius_point->sun) ? $aquarius_point->sun : 'Na' }}</td>
                                        <td>{{ isset($aquarius_point->moon) ? $aquarius_point->moon : 'Na' }}</td>
                                        <td>{{ isset($aquarius_point->mars) ? $aquarius_point->mars : 'Na' }}</td>
                                        <td>{{ isset($aquarius_point->mercury) ? $aquarius_point->mercury : 'Na' }}</td>
                                        <td>{{ isset($aquarius_point->jupiter) ? $aquarius_point->jupiter : 'Na' }}</td>
                                        <td>{{ isset($aquarius_point->venus) ? $aquarius_point->venus : 'Na' }}</td>
                                        <td>{{ isset($aquarius_point->saturn) ? $aquarius_point->saturn : 'Na' }}</td>
                                        <td>{{ isset($aquarius_point->ascendant) ? $aquarius_point->ascendant : 'Na' }}</td>
                                        <td>{{ isset($aquarius_point->total) ? $aquarius_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Pisces</b></td>
                                        <td>{{ isset($pisces_point->sun) ? $pisces_point->sun : 'Na' }}</td>
                                        <td>{{ isset($pisces_point->moon) ? $pisces_point->moon : 'Na' }}</td>
                                        <td>{{ isset($pisces_point->mars) ? $pisces_point->mars : 'Na' }}</td>
                                        <td>{{ isset($pisces_point->mercury) ? $pisces_point->mercury : 'Na' }}</td>
                                        <td>{{ isset($pisces_point->jupiter) ? $pisces_point->jupiter : 'Na' }}</td>
                                        <td>{{ isset($pisces_point->venus) ? $pisces_point->venus : 'Na' }}</td>
                                        <td>{{ isset($pisces_point->saturn) ? $pisces_point->saturn : 'Na' }}</td>
                                        <td>{{ isset($pisces_point->ascendant) ? $pisces_point->ascendant : 'Na' }}</td>
                                        <td>{{ isset($pisces_point->total) ? $pisces_point->total : 'Na' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endforeach
    @endif

    @if (isset($customer->planetary_synergy))
        @if ($customer->planetary_synergy->count() > 0)
            @php
                $planetary_synergy = $customer->planetary_synergy[0];
                $naturalFriendship = json_decode($planetary_synergy->naturalFriendship);
                $temporaryFriendship = json_decode($planetary_synergy->temporaryFriendship);
                $panchandhaChakra = json_decode($planetary_synergy->panchandhaChakra);
            @endphp
            <table style="background-color: #fff; width: 100%;margin: 0 auto;">
                <h2 style="margin-bottom: 0px;">Planetary Synergy</h2>
                <p style="margin-top: 0px;">Panchandha Maitri is unique way of determining friends and enemies of any particular planet in your Kundli. This is combination of natural and temporal friendships and highly used for predictions.</p>
                
                <tbody>
                    <tr>
                        <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                           <h5 style="font-size: 18px;margin-bottom: 6px;margin-top: 12px;">Panchadha Chakra</h5>
                            <table>
                                <thead>
                                    <tr>
                                        <td> </td>
                                        <td><b>Sun</b></td>
                                        <td><b>Moon</b></td>
                                        <td><b>Mars</b></td>
                                        <td><b>Mercury</b></td>
                                        <td><b>Jupiter</b></td>
                                        <td><b>Venus</b></td>
                                        <td><b>Saturn</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <td><b>Sun</b></td>
                                        <td>{{ isset($panchandhaChakra->SUN[0]) ? $panchandhaChakra->SUN[0] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->SUN[1]) ? $panchandhaChakra->SUN[1] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->SUN[2]) ? $panchandhaChakra->SUN[2] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->SUN[3]) ? $panchandhaChakra->SUN[3] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->SUN[4]) ? $panchandhaChakra->SUN[4] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->SUN[5]) ? $panchandhaChakra->SUN[5] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->SUN[6]) ? $panchandhaChakra->SUN[6] : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Moon</b></td>
                                        <td>{{ isset($panchandhaChakra->MOON[0]) ? $panchandhaChakra->MOON[0] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->MOON[1]) ? $panchandhaChakra->MOON[1] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->MOON[2]) ? $panchandhaChakra->MOON[2] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->MOON[3]) ? $panchandhaChakra->MOON[3] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->MOON[4]) ? $panchandhaChakra->MOON[4] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->MOON[5]) ? $panchandhaChakra->MOON[5] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->MOON[6]) ? $panchandhaChakra->MOON[6] : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Mars</b></td>
                                        <td>{{ isset($panchandhaChakra->MARS[0]) ? $panchandhaChakra->MARS[0] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->MARS[1]) ? $panchandhaChakra->MARS[1] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->MARS[2]) ? $panchandhaChakra->MARS[2] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->MARS[3]) ? $panchandhaChakra->MARS[3] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->MARS[4]) ? $panchandhaChakra->MARS[4] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->MARS[5]) ? $panchandhaChakra->MARS[5] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->MARS[6]) ? $panchandhaChakra->MARS[6] : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Mercury</b></td>
                                        <td>{{ isset($panchandhaChakra->MERCURY[0]) ? $panchandhaChakra->MERCURY[0] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->MERCURY[1]) ? $panchandhaChakra->MERCURY[1] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->MERCURY[2]) ? $panchandhaChakra->MERCURY[2] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->MERCURY[3]) ? $panchandhaChakra->MERCURY[3] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->MERCURY[4]) ? $panchandhaChakra->MERCURY[4] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->MERCURY[5]) ? $panchandhaChakra->MERCURY[5] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->MERCURY[6]) ? $panchandhaChakra->MERCURY[6] : 'Na' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Jupiter</b></td>
                                        <td>{{ isset($panchandhaChakra->JUPITER[0]) ? $panchandhaChakra->JUPITER[0] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->JUPITER[1]) ? $panchandhaChakra->JUPITER[1] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->JUPITER[2]) ? $panchandhaChakra->JUPITER[2] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->JUPITER[3]) ? $panchandhaChakra->JUPITER[3] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->JUPITER[4]) ? $panchandhaChakra->JUPITER[4] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->JUPITER[5]) ? $panchandhaChakra->JUPITER[5] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->JUPITER[6]) ? $panchandhaChakra->JUPITER[6] : 'Na' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Venus</b></td>
                                        <td>{{ isset($panchandhaChakra->VENUS[0]) ? $panchandhaChakra->VENUS[0] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->VENUS[1]) ? $panchandhaChakra->VENUS[1] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->VENUS[2]) ? $panchandhaChakra->VENUS[2] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->VENUS[3]) ? $panchandhaChakra->VENUS[3] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->VENUS[4]) ? $panchandhaChakra->VENUS[4] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->VENUS[5]) ? $panchandhaChakra->VENUS[5] : 'Na' }}</td>
                                        <td>{{ isset($panchandhaChakra->VENUS[6]) ? $panchandhaChakra->VENUS[6] : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Saturn</b></td>
                                        <td>{{ isset($panchandhaChakra->SATURN[0]) ? $panchandhaChakra->SATURN[0] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->SATURN[1]) ? $panchandhaChakra->SATURN[1] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->SATURN[2]) ? $panchandhaChakra->SATURN[2] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->SATURN[3]) ? $panchandhaChakra->SATURN[3] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->SATURN[4]) ? $panchandhaChakra->SATURN[4] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->SATURN[5]) ? $panchandhaChakra->SATURN[5] : 'Na' }}
                                        </td>
                                        <td>{{ isset($panchandhaChakra->SATURN[6]) ? $panchandhaChakra->SATURN[6] : 'Na' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        
            <table style="background-color: #fff; width: 100%;margin: 0 auto;">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                            <h5 style="font-size: 18px;margin-bottom: 6px;margin-top: 20px;">Natural Friendship</h5>
                            <table>
                                <thead>
                                    <tr>
                                        <td><b>PL</b></td>
                                        <td><b>Sun</b></td>
                                        <td><b>Moon</b></td>
                                        <td><b>Mars</b></td>
                                        <td><b>Mercury</b></td>
                                        <td><b>Jupiter</b></td>
                                        <td><b>Venus</b></td>
                                        <td><b>Saturn</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <td><b>Sun</b></td>
                                        <td>{{ isset($naturalFriendship->SUN[0]) ? $naturalFriendship->SUN[0] : 'Na' }}</td>
                        <td>{{ isset($naturalFriendship->SUN[1]) ? $naturalFriendship->SUN[1] : 'Na' }}</td>
                        <td>{{ isset($naturalFriendship->SUN[2]) ? $naturalFriendship->SUN[2] : 'Na' }}</td>
                        <td>{{ isset($naturalFriendship->SUN[3]) ? $naturalFriendship->SUN[3] : 'Na' }}</td>
                        <td>{{ isset($naturalFriendship->SUN[4]) ? $naturalFriendship->SUN[4] : 'Na' }}</td>
                        <td>{{ isset($naturalFriendship->SUN[5]) ? $naturalFriendship->SUN[5] : 'Na' }}</td>
                        <td>{{ isset($naturalFriendship->SUN[6]) ? $naturalFriendship->SUN[6] : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Moon</b></td>
                                        <td>{{ isset($naturalFriendship->MOON[0]) ? $naturalFriendship->MOON[0] : 'Na' }}</td>
                                        <td>{{ isset($naturalFriendship->MOON[1]) ? $naturalFriendship->MOON[1] : 'Na' }}</td>
                                        <td>{{ isset($naturalFriendship->MOON[2]) ? $naturalFriendship->MOON[2] : 'Na' }}</td>
                                        <td>{{ isset($naturalFriendship->MOON[3]) ? $naturalFriendship->MOON[3] : 'Na' }}</td>
                                        <td>{{ isset($naturalFriendship->MOON[4]) ? $naturalFriendship->MOON[4] : 'Na' }}</td>
                                        <td>{{ isset($naturalFriendship->MOON[5]) ? $naturalFriendship->MOON[5] : 'Na' }}</td>
                                        <td>{{ isset($naturalFriendship->MOON[6]) ? $naturalFriendship->MOON[6] : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Mars</b></td>
                                        <td>{{ isset($naturalFriendship->MARS[0]) ? $naturalFriendship->MARS[0] : 'Na' }}</td>
                                        <td>{{ isset($naturalFriendship->MARS[1]) ? $naturalFriendship->MARS[1] : 'Na' }}</td>
                                        <td>{{ isset($naturalFriendship->MARS[2]) ? $naturalFriendship->MARS[2] : 'Na' }}</td>
                                        <td>{{ isset($naturalFriendship->MARS[3]) ? $naturalFriendship->MARS[3] : 'Na' }}</td>
                                        <td>{{ isset($naturalFriendship->MARS[4]) ? $naturalFriendship->MARS[4] : 'Na' }}</td>
                                        <td>{{ isset($naturalFriendship->MARS[5]) ? $naturalFriendship->MARS[5] : 'Na' }}</td>
                                        <td>{{ isset($naturalFriendship->MARS[6]) ? $naturalFriendship->MARS[6] : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Mercury</b></td>
                                        <td>{{ isset($naturalFriendship->MERCURY[0]) ? $naturalFriendship->MERCURY[0] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->MERCURY[1]) ? $naturalFriendship->MERCURY[1] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->MERCURY[2]) ? $naturalFriendship->MERCURY[2] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->MERCURY[3]) ? $naturalFriendship->MERCURY[3] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->MERCURY[4]) ? $naturalFriendship->MERCURY[4] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->MERCURY[5]) ? $naturalFriendship->MERCURY[5] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->MERCURY[6]) ? $naturalFriendship->MERCURY[6] : 'Na' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Jupiter</b></td>
                                        <td>{{ isset($naturalFriendship->JUPITER[0]) ? $naturalFriendship->JUPITER[0] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->JUPITER[1]) ? $naturalFriendship->JUPITER[1] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->JUPITER[2]) ? $naturalFriendship->JUPITER[2] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->JUPITER[3]) ? $naturalFriendship->JUPITER[3] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->JUPITER[4]) ? $naturalFriendship->JUPITER[4] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->JUPITER[5]) ? $naturalFriendship->JUPITER[5] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->JUPITER[6]) ? $naturalFriendship->JUPITER[6] : 'Na' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Venus</b></td>
                                        <td>{{ isset($naturalFriendship->VENUS[0]) ? $naturalFriendship->VENUS[0] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->VENUS[1]) ? $naturalFriendship->VENUS[1] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->VENUS[2]) ? $naturalFriendship->VENUS[2] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->VENUS[3]) ? $naturalFriendship->VENUS[3] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->VENUS[4]) ? $naturalFriendship->VENUS[4] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->VENUS[5]) ? $naturalFriendship->VENUS[5] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->VENUS[6]) ? $naturalFriendship->VENUS[6] : 'Na' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Saturn</b></td>
                                        <td>{{ isset($naturalFriendship->SATURN[0]) ? $naturalFriendship->SATURN[0] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->SATURN[1]) ? $naturalFriendship->SATURN[1] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->SATURN[2]) ? $naturalFriendship->SATURN[2] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->SATURN[3]) ? $naturalFriendship->SATURN[3] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->SATURN[4]) ? $naturalFriendship->SATURN[4] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->SATURN[5]) ? $naturalFriendship->SATURN[5] : 'Na' }}
                                        </td>
                                        <td>{{ isset($naturalFriendship->SATURN[6]) ? $naturalFriendship->SATURN[6] : 'Na' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        
            <table style="background-color: #fff; width: 100%;margin: 0 auto;">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                           <h5 style="font-size: 18px;margin-bottom: 6px;margin-top: 20px;">Temporary Friendship</h5>
                            <table>
                                <thead>
                                    <tr>
                                        <td> </td>
                                        <td><b>Sun</b></td>
                                        <td><b>Moon</b></td>
                                        <td><b>Mars</b></td>
                                        <td><b>Mercury</b></td>
                                        <td><b>Jupiter</b></td>
                                        <td><b>Venus</b></td>
                                        <td><b>Saturn</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <td><b>Sun</b></td>
                                        <td>{{ isset($temporaryFriendship->SUN[0]) ? $temporaryFriendship->SUN[0] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->SUN[1]) ? $temporaryFriendship->SUN[1] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->SUN[2]) ? $temporaryFriendship->SUN[2] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->SUN[3]) ? $temporaryFriendship->SUN[3] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->SUN[4]) ? $temporaryFriendship->SUN[4] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->SUN[5]) ? $temporaryFriendship->SUN[5] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->SUN[6]) ? $temporaryFriendship->SUN[6] : 'Na' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Moon</b></td>
                                        <td>{{ isset($temporaryFriendship->MOON[0]) ? $temporaryFriendship->MOON[0] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MOON[1]) ? $temporaryFriendship->MOON[1] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MOON[2]) ? $temporaryFriendship->MOON[2] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MOON[3]) ? $temporaryFriendship->MOON[3] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MOON[4]) ? $temporaryFriendship->MOON[4] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MOON[5]) ? $temporaryFriendship->MOON[5] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MOON[6]) ? $temporaryFriendship->MOON[6] : 'Na' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Mars</b></td>
                                        <td>{{ isset($temporaryFriendship->MARS[0]) ? $temporaryFriendship->MARS[0] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MARS[1]) ? $temporaryFriendship->MARS[1] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MARS[2]) ? $temporaryFriendship->MARS[2] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MARS[3]) ? $temporaryFriendship->MARS[3] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MARS[4]) ? $temporaryFriendship->MARS[4] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MARS[5]) ? $temporaryFriendship->MARS[5] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MARS[6]) ? $temporaryFriendship->MARS[6] : 'Na' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ isset($temporaryFriendship->MERCURY[0]) ? $temporaryFriendship->MERCURY[0] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MERCURY[1]) ? $temporaryFriendship->MERCURY[1] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MERCURY[2]) ? $temporaryFriendship->MERCURY[2] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MERCURY[3]) ? $temporaryFriendship->MERCURY[3] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MERCURY[4]) ? $temporaryFriendship->MERCURY[4] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MERCURY[5]) ? $temporaryFriendship->MERCURY[5] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->MERCURY[6]) ? $temporaryFriendship->MERCURY[6] : 'Na' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Jupiter</b></td>
                                        <td>{{ isset($temporaryFriendship->JUPITER[0]) ? $temporaryFriendship->JUPITER[0] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->JUPITER[1]) ? $temporaryFriendship->JUPITER[1] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->JUPITER[2]) ? $temporaryFriendship->JUPITER[2] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->JUPITER[3]) ? $temporaryFriendship->JUPITER[3] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->JUPITER[4]) ? $temporaryFriendship->JUPITER[4] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->JUPITER[5]) ? $temporaryFriendship->JUPITER[5] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->JUPITER[6]) ? $temporaryFriendship->JUPITER[6] : 'Na' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Venus</b></td>
                                        <td>{{ isset($temporaryFriendship->VENUS[0]) ? $temporaryFriendship->VENUS[0] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->VENUS[1]) ? $temporaryFriendship->VENUS[1] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->VENUS[2]) ? $temporaryFriendship->VENUS[2] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->VENUS[3]) ? $temporaryFriendship->VENUS[3] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->VENUS[4]) ? $temporaryFriendship->VENUS[4] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->VENUS[5]) ? $temporaryFriendship->VENUS[5] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->VENUS[6]) ? $temporaryFriendship->VENUS[6] : 'Na' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Saturn</b></td>
                                        <td>{{ isset($temporaryFriendship->SATURN[0]) ? $temporaryFriendship->SATURN[0] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->SATURN[1]) ? $temporaryFriendship->SATURN[1] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->SATURN[2]) ? $temporaryFriendship->SATURN[2] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->SATURN[3]) ? $temporaryFriendship->SATURN[3] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->SATURN[4]) ? $temporaryFriendship->SATURN[4] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->SATURN[5]) ? $temporaryFriendship->SATURN[5] : 'Na' }}
                                        </td>
                                        <td>{{ isset($temporaryFriendship->SATURN[6]) ? $temporaryFriendship->SATURN[6] : 'Na' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif
    @endif
    @if (isset($customer->sarvashtak))
        @if ($customer->sarvashtak->count() > 0)
            @php
                $sarvashtak = $customer->sarvashtak[0];
                $ser_plant = json_decode(isset($sarvashtak->ashtak_points) ? $sarvashtak->ashtak_points : null);
                $sarvashtak_varga = json_decode(isset($sarvashtak->ashtak_varga) ? $sarvashtak->ashtak_varga : null);
                $aries_point = isset($ser_plant->aries) ? $ser_plant->aries : null;
                $taurus_point = isset($ser_plant->taurus) ? $ser_plant->taurus : null;
                $gemini_point = isset($ser_plant->gemini) ? $ser_plant->gemini : null;
                $cancer_point = isset($ser_plant->cancer) ? $ser_plant->cancer : null;
                $leo_point = isset($ser_plant->leo) ? $ser_plant->leo : null;
                $virgo_point = isset($ser_plant->virgo) ? $ser_plant->virgo : null;
                $libra_point = isset($ser_plant->libra) ? $ser_plant->libra : null;
                $scorpio_point = isset($ser_plant->scorpio) ? $ser_plant->scorpio : null;
                $sagittarius_point = isset($ser_plant->sagittarius) ? $ser_plant->sagittarius : null;
                $capricorn_point = isset($ser_plant->capricorn) ? $ser_plant->capricorn : null;
                $aquarius_point = isset($ser_plant->aquarius) ? $ser_plant->aquarius : null;
                $pisces_point = isset($ser_plant->pisces) ? $ser_plant->pisces : null;
            @endphp
            <table style="background-color: #fff; width: 100%;margin: 0 auto;">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                           <h2 style="margin-bottom: 0px;">Sarvashtak</h2>
                            <p style="margin-top: 0px;">Sarvashtak is used to determine and fine tune the prediction accuracies based on Dasha and Transit forecasts. 4 or lesser are considered not good whereas more than 4 points are favorable.</p>
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width: 50%;"><b>Type</b></td>
                                        <td>{{ isset($sarvashtak_varga->type) ? $sarvashtak_varga->type : 'Na' }}</td>
                                    </tr>
                                    <tr style="background-color: transparent;">
                                        <td><b>Sign</b></td>
                                        <td>{{ isset($sarvashtak_varga->sign) ? $sarvashtak_varga->sign : 'Na' }}</td> 
                                    </tr>
                                    <tr>
                                        <td><b>Sign Id</b></td>
                                        <td>{{ isset($sarvashtak_varga->sign_id) ? $sarvashtak_varga->sign_id : 'Na' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        
            <table style="background-color: #fff; width: 100%;margin: 0 auto;">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                            <h5 style="font-size: 18px;margin-bottom: 6px;margin-top: 12px;">Ashtak Points</h5>
                            <table>
                                <thead>
                                    <tr>
                                        <td></td>
                                        <td><b>Sun</b></td>
                                        <td><b>Moon</b></td>
                                        <td><b>Mars</b></td>
                                        <td><b>Mercury</b></td>
                                        <td><b>Jupiter</b></td>
                                        <td><b>Venus</b></td>
                                        <td><b>Saturn</b></td>
                                        <td><b>Ascendant</b></td>
                                        <td><b>Total</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <td><b>Aries</b></td>
                                        <td>{{ isset($aries_point->sun) ? $aries_point->sun : 'Na' }}</td>
                                        <td>{{ isset($aries_point->moon) ? $aries_point->moon : 'Na' }}</td>
                                        <td>{{ isset($aries_point->mars) ? $aries_point->mars : 'Na' }}</td>
                                        <td>{{ isset($aries_point->mercury) ? $aries_point->mercury : 'Na' }}</td>
                                        <td>{{ isset($aries_point->jupiter) ? $aries_point->jupiter : 'Na' }}</td>
                                        <td>{{ isset($aries_point->venus) ? $aries_point->venus : 'Na' }}</td>
                                        <td>{{ isset($aries_point->saturn) ? $aries_point->saturn : 'Na' }}</td>
                                        <td>{{ isset($aries_point->ascendant) ? $aries_point->ascendant : 'Na' }}</td>
                                        <td>{{ isset($aries_point->total) ? $aries_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Taurus</b></td>
                                        <td>{{ isset($taurus_point->sun) ? $taurus_point->sun : 'Na' }}</td>
                        <td>{{ isset($taurus_point->moon) ? $taurus_point->moon : 'Na' }}</td>
                        <td>{{ isset($taurus_point->mars) ? $taurus_point->mars : 'Na' }}</td>
                        <td>{{ isset($taurus_point->mercury) ? $taurus_point->mercury : 'Na' }}</td>
                        <td>{{ isset($taurus_point->jupiter) ? $taurus_point->jupiter : 'Na' }}</td>
                        <td>{{ isset($taurus_point->venus) ? $taurus_point->venus : 'Na' }}</td>
                        <td>{{ isset($taurus_point->saturn) ? $taurus_point->saturn : 'Na' }}</td>
                        <td>{{ isset($taurus_point->ascendant) ? $taurus_point->ascendant : 'Na' }}</td>
                        <td>{{ isset($taurus_point->total) ? $taurus_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Gemini</b></td>
                                        <td>{{ isset($gemini_point->sun) ? $gemini_point->sun : 'Na' }}</td>
                        <td>{{ isset($gemini_point->moon) ? $gemini_point->moon : 'Na' }}</td>
                        <td>{{ isset($gemini_point->mars) ? $gemini_point->mars : 'Na' }}</td>
                        <td>{{ isset($gemini_point->mercury) ? $gemini_point->mercury : 'Na' }}</td>
                        <td>{{ isset($gemini_point->jupiter) ? $gemini_point->jupiter : 'Na' }}</td>
                        <td>{{ isset($gemini_point->venus) ? $gemini_point->venus : 'Na' }}</td>
                        <td>{{ isset($gemini_point->saturn) ? $gemini_point->saturn : 'Na' }}</td>
                        <td>{{ isset($gemini_point->ascendant) ? $gemini_point->ascendant : 'Na' }}</td>
                        <td>{{ isset($gemini_point->total) ? $gemini_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Cancer</b></td>
                                        <td>{{ isset($cancer_point->sun) ? $cancer_point->sun : 'Na' }}</td>
                        <td>{{ isset($cancer_point->moon) ? $cancer_point->moon : 'Na' }}</td>
                        <td>{{ isset($cancer_point->mars) ? $cancer_point->mars : 'Na' }}</td>
                        <td>{{ isset($cancer_point->mercury) ? $cancer_point->mercury : 'Na' }}</td>
                        <td>{{ isset($cancer_point->jupiter) ? $cancer_point->jupiter : 'Na' }}</td>
                        <td>{{ isset($cancer_point->venus) ? $cancer_point->venus : 'Na' }}</td>
                        <td>{{ isset($cancer_point->saturn) ? $cancer_point->saturn : 'Na' }}</td>
                        <td>{{ isset($cancer_point->ascendant) ? $cancer_point->ascendant : 'Na' }}</td>
                        <td>{{ isset($cancer_point->total) ? $cancer_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Leo</b></td>
                                        <td>{{ isset($leo_point->sun) ? $leo_point->sun : 'Na' }}</td>
                        <td>{{ isset($leo_point->moon) ? $leo_point->moon : 'Na' }}</td>
                        <td>{{ isset($leo_point->mars) ? $leo_point->mars : 'Na' }}</td>
                        <td>{{ isset($leo_point->mercury) ? $leo_point->mercury : 'Na' }}</td>
                        <td>{{ isset($leo_point->jupiter) ? $leo_point->jupiter : 'Na' }}</td>
                        <td>{{ isset($leo_point->venus) ? $leo_point->venus : 'Na' }}</td>
                        <td>{{ isset($leo_point->saturn) ? $leo_point->saturn : 'Na' }}</td>
                        <td>{{ isset($leo_point->ascendant) ? $leo_point->ascendant : 'Na' }}</td>
                        <td>{{ isset($leo_point->total) ? $leo_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Virgo</b></td>
                                        <td>{{ isset($virgo_point->sun) ? $virgo_point->sun : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->moon) ? $virgo_point->moon : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->mars) ? $virgo_point->mars : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->mercury) ? $virgo_point->mercury : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->jupiter) ? $virgo_point->jupiter : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->venus) ? $virgo_point->venus : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->saturn) ? $virgo_point->saturn : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->ascendant) ? $virgo_point->ascendant : 'Na' }}</td>
                                        <td>{{ isset($virgo_point->total) ? $virgo_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Libra</b></td>
                                        <td>{{ isset($libra_point->sun) ? $libra_point->sun : 'Na' }}</td>
                                        <td>{{ isset($libra_point->moon) ? $libra_point->moon : 'Na' }}</td>
                                        <td>{{ isset($libra_point->mars) ? $libra_point->mars : 'Na' }}</td>
                                        <td>{{ isset($libra_point->mercury) ? $libra_point->mercury : 'Na' }}</td>
                                        <td>{{ isset($libra_point->jupiter) ? $libra_point->jupiter : 'Na' }}</td>
                                        <td>{{ isset($libra_point->venus) ? $libra_point->venus : 'Na' }}</td>
                                        <td>{{ isset($libra_point->saturn) ? $libra_point->saturn : 'Na' }}</td>
                                        <td>{{ isset($libra_point->ascendant) ? $libra_point->ascendant : 'Na' }}</td>
                                        <td>{{ isset($libra_point->total) ? $libra_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Scorpio</b></td>
                                        <td>{{ isset($scorpio_point->sun) ? $scorpio_point->sun : 'Na' }}</td>
                        <td>{{ isset($scorpio_point->moon) ? $scorpio_point->moon : 'Na' }}</td>
                        <td>{{ isset($scorpio_point->mars) ? $scorpio_point->mars : 'Na' }}</td>
                        <td>{{ isset($scorpio_point->mercury) ? $scorpio_point->mercury : 'Na' }}</td>
                        <td>{{ isset($scorpio_point->jupiter) ? $scorpio_point->jupiter : 'Na' }}</td>
                        <td>{{ isset($scorpio_point->venus) ? $scorpio_point->venus : 'Na' }}</td>
                        <td>{{ isset($scorpio_point->saturn) ? $scorpio_point->saturn : 'Na' }}</td>
                        <td>{{ isset($scorpio_point->ascendant) ? $scorpio_point->ascendant : 'Na' }}</td>
                        <td>{{ isset($scorpio_point->total) ? $scorpio_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Sagittarius</b></td>
                                        <td>{{ isset($sagittarius_point->sun) ? $sagittarius_point->sun : 'Na' }}</td>
                        <td>{{ isset($sagittarius_point->moon) ? $sagittarius_point->moon : 'Na' }}</td>
                        <td>{{ isset($sagittarius_point->mars) ? $sagittarius_point->mars : 'Na' }}</td>
                        <td>{{ isset($sagittarius_point->mercury) ? $sagittarius_point->mercury : 'Na' }}</td>
                        <td>{{ isset($sagittarius_point->jupiter) ? $sagittarius_point->jupiter : 'Na' }}</td>
                        <td>{{ isset($sagittarius_point->venus) ? $sagittarius_point->venus : 'Na' }}</td>
                        <td>{{ isset($sagittarius_point->saturn) ? $sagittarius_point->saturn : 'Na' }}</td>
                        <td>{{ isset($sagittarius_point->ascendant) ? $sagittarius_point->ascendant : 'Na' }}</td>
                        <td>{{ isset($sagittarius_point->total) ? $sagittarius_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Capricorn</b></td>
                                        <td>{{ isset($capricorn_point->sun) ? $capricorn_point->sun : 'Na' }}</td>
                        <td>{{ isset($capricorn_point->moon) ? $capricorn_point->moon : 'Na' }}</td>
                        <td>{{ isset($capricorn_point->mars) ? $capricorn_point->mars : 'Na' }}</td>
                        <td>{{ isset($capricorn_point->mercury) ? $capricorn_point->mercury : 'Na' }}</td>
                        <td>{{ isset($capricorn_point->jupiter) ? $capricorn_point->jupiter : 'Na' }}</td>
                        <td>{{ isset($capricorn_point->venus) ? $capricorn_point->venus : 'Na' }}</td>
                        <td>{{ isset($capricorn_point->saturn) ? $capricorn_point->saturn : 'Na' }}</td>
                        <td>{{ isset($capricorn_point->ascendant) ? $capricorn_point->ascendant : 'Na' }}</td>
                        <td>{{ isset($capricorn_point->total) ? $capricorn_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Aquarius</b></td>
                                        <td>{{ isset($aquarius_point->sun) ? $aquarius_point->sun : 'Na' }}</td>
                        <td>{{ isset($aquarius_point->moon) ? $aquarius_point->moon : 'Na' }}</td>
                        <td>{{ isset($aquarius_point->mars) ? $aquarius_point->mars : 'Na' }}</td>
                        <td>{{ isset($aquarius_point->mercury) ? $aquarius_point->mercury : 'Na' }}</td>
                        <td>{{ isset($aquarius_point->jupiter) ? $aquarius_point->jupiter : 'Na' }}</td>
                        <td>{{ isset($aquarius_point->venus) ? $aquarius_point->venus : 'Na' }}</td>
                        <td>{{ isset($aquarius_point->saturn) ? $aquarius_point->saturn : 'Na' }}</td>
                        <td>{{ isset($aquarius_point->ascendant) ? $aquarius_point->ascendant : 'Na' }}</td>
                        <td>{{ isset($aquarius_point->total) ? $aquarius_point->total : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Pisces</b></td>
                                        <td>{{ isset($pisces_point->sun) ? $pisces_point->sun : 'Na' }}</td>
                        <td>{{ isset($pisces_point->moon) ? $pisces_point->moon : 'Na' }}</td>
                        <td>{{ isset($pisces_point->mars) ? $pisces_point->mars : 'Na' }}</td>
                        <td>{{ isset($pisces_point->mercury) ? $pisces_point->mercury : 'Na' }}</td>
                        <td>{{ isset($pisces_point->jupiter) ? $pisces_point->jupiter : 'Na' }}</td>
                        <td>{{ isset($pisces_point->venus) ? $pisces_point->venus : 'Na' }}</td>
                        <td>{{ isset($pisces_point->saturn) ? $pisces_point->saturn : 'Na' }}</td>
                        <td>{{ isset($pisces_point->ascendant) ? $pisces_point->ascendant : 'Na' }}</td>
                        <td>{{ isset($pisces_point->total) ? $pisces_point->total : 'Na' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif
    @endif
    @if (isset($customer->maha_dasha))
        @if ($customer->maha_dasha->count() > 0)
        <table style="background-color: #fff; width: 100%;margin: 0 auto;">
            <tbody>
                <tr>
                    <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                        <h3>Maha char dasha</h3>
                            @foreach ($customer->maha_dasha as $m_dasha)
                            <table>
                                <thead>
                                    <th colspan="4" style="font-size: 18px;background-color: #ffd3d3;padding: 6px 8px;"> {{ isset($m_dasha->sign_name) ? $m_dasha->sign_name : 'Na' }}</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>Sign id</b></td>
                                        <td>{{ isset($m_dasha->sign_id) ? $m_dasha->sign_id : 'Na' }}</td>
                                        <td><b>Duration</b></td>
                                        <td>{{ isset($m_dasha->duration) ? $m_dasha->duration. 'Years' : 'Na' }}</td>
                                    </tr>
                                    <tr style="background-color: transparent;">    
                                        <td><b>Start date</b></td>
                                        <td>{{ isset($m_dasha->start_date) ? get_default_format($m_dasha->start_date) : 'Na' }}</td>
                                        <td><b>End date</b></td>
                                        <td> {{ isset($m_dasha->end_date) ? get_default_format($m_dasha->end_date) : 'Na' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif
    @endif

    @if (isset($customer->manglikDosh))
        @if ($customer->manglikDosh->count() > 0)
            @php
            $manglik_dosh = $customer->manglikDosh;
            @endphp
            <table style="background-color: #fff; width: 100%;margin: 0 auto;">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                           <h2 style="margin-bottom: 10px;">Manglik Dosh</h2>
        
                            <h6 style="margin-bottom: 0px;font-size: 16px;margin-top: 10px;">Manglik Present Based on aspect</h6>
                            <ul style="padding-left: 24px;margin-top: 6px;">
                                @foreach (json_decode($manglik_dosh->based_on_aspect) as $based_on_aspect)
                                              <li>  {{ isset($based_on_aspect) ? ' "' . $based_on_aspect . '"' : 'N/A' }}</li>
                                            @endforeach
                            </ul> 
                        </td>
                    </tr>
                </tbody>
            </table>
        
            <table style="background-color: #fff; width: 100%;margin: 0 auto;">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><b>Is mars manglik cancelled</b></td>
                                        <td> @if (isset($manglik_dosh->is_mars_manglik_cancelled))
                                            @if ($manglik_dosh->is_mars_manglik_cancelled == true)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        @endif</td>    
                                        <td><b>Is Present</b></td>
                                        <td> @if (isset($manglik_dosh->is_present))
                                            @if ($manglik_dosh->is_present == true)
                                                Effective
                                            @else
                                                No
                                            @endif
                                        @endif</td>
                                    </tr>
                                    <tr style="background-color: transparent;">    
                                        <td><b>Percentage Manglik Present</b></td>
                                        <td> {{ isset($manglik_dosh->percentage_manglik_present) ? $manglik_dosh->percentage_manglik_present : 'N/A' }}</td>
                                        <td><b>Based on Aspect</b></td>
                                        <td>{{ isset($manglik_dosh->percentage_manglik_after_cancellation) ? $manglik_dosh->percentage_manglik_after_cancellation : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="border:none;font-size: 16px;padding-top: 20px;"><b style="font-size: 18px;">Percentage manglik after cancellation :</b><br/>
                                            @foreach (json_decode($manglik_dosh->based_on_aspect) as $based_on_aspect)
                                                {{ isset($based_on_aspect) ? ' "' . $based_on_aspect . '"' : 'N/A' }},
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr style="background-color: transparent;">
                                        <td colspan="4" style="border:none;font-size: 16px;"><b style="font-size: 18px;">Based on house :</b><br/>
                                            @foreach (json_decode($manglik_dosh->based_on_house) as $based_on_house)
                                                {{ isset($based_on_house) ? ' "' . $based_on_house . '"' : 'N/A' }},
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="border:none;font-size: 16px;"><b style="font-size: 18px;">Manglik report :</b><br/>
                                            {{ isset($manglik_dosh->manglik_report) ? $manglik_dosh->manglik_report : 'N/A' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table> 
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif
    @endif

    @if (isset($customer->pitra_dosh))
        @if ($customer->pitra_dosh->count() > 0)
            @php
                $pitra_dosh = $customer->pitra_dosh;
            @endphp
        <h3>Pitra Dosh</h3>
        <table style="background-color: #fff; width: 100%;margin: 0 auto;">
            <tbody>
                <tr>
                    <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                       <h2 style="margin-bottom: 10px;">Pitra Dosh</h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td style="border:none;font-size: 16px;padding: 0px;padding: 6px 0px 12px 0px;"><b style="font-size: 18px;">What is pitr dosh :</b><br/>  {{ isset($pitra_dosh->what_is_pitri_dosha) ? $pitra_dosh->what_is_pitri_dosha : 'Na' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is Pitradosh Present :</b>
                                        @if (isset($pitra_dosh->is_pitri_dosha_present))
                                        @if ($pitra_dosh->is_pitri_dosha_present == true)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    @else
                                        N/a
                                    @endif</td>
                                </tr>
                                <tr>
                                    <td><b>Rule Matched :</b> {{ isset($pitra_dosh->rules_matched) ? $pitra_dosh->rules_matched : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Conclusion :</b>  {{ isset($pitra_dosh->conclusion) ? $pitra_dosh->conclusion : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Remedies :</b>  {{ isset($pitra_dosh->remedies) ? $pitra_dosh->remedies : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Effects :</b>  {{ isset($pitra_dosh->effects) ? $pitra_dosh->effects : 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table> 
                    </td>
                </tr>
            </tbody>
        </table>
        @endif
    @endif

    @if (isset($customer->planetaryPositions))
        @if ($customer->planetaryPositions->count() > 0)
        <h2 style="margin-bottom: 10px;">Planetary positions</h2>
            @foreach ($customer->planetaryPositions as $planat_position)
            <table style="background-color: #fff; width: 100%;margin: 0 auto;">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; border:none;padding-left: 20px;padding-right: 20px;">
                           <h5 style="margin: 20px 0px 0px 0px;font-size: 16px;">
                            {{ isset($planat_position->name) ? $planat_position->name : 'Na' }},
                            {{ isset($planat_position->sign) ? '  ' . $planat_position->sign : 'Na' }},
                            {{ isset($planat_position->nakshatra) ? '  ' . $planat_position->nakshatra : 'Na' }}
                            </h5>
                            <table>
                                <tbody>
                                    <tr>
                                        <td><b>Full degree</b></td>
                                        <td> {{ isset($planat_position->full_degree) ? convertFullDegree($planat_position->full_degree) : 'Na' }}</td> 
                                        <td><b>Sign degree</b></td>
                                        <td>{{ isset($planat_position->sign_degree) ? convertFullDegree($planat_position->sign_degree) : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>State</b></td>
                                        <td>{{ isset($planat_position->state) ? $planat_position->state : 'Na' }}</td>
                                        <td><b>Speed</b></td>
                                        <td>{{ isset($planat_position->speed) ? convertFullDegree($planat_position->speed) : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Is retro</b></td>
                                        <td>
                                            @if (isset($planat_position->is_retro))
                                                @if ($planat_position->is_retro == true)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            @else
                                                Na
                                            @endif
                                        </td>
                                        <td><b>Sign</b></td>
                                        <td>
                                            {{ isset($planat_position->sign) ? $planat_position->sign : 'Na' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Sign lord</b></td>
                                        <td>
                                            {{ isset($planat_position->sign_lord) ? $planat_position->sign_lord : 'Na' }}
                                        </td>
                                        <td><b>Nakshatra</b></td>
                                        <td>
                                            {{ isset($planat_position->nakshatra) ? $planat_position->nakshatra : 'Na' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Nakshatra lord</b></td>
                                        <td>
                                            {{ isset($planat_position->nakshatra_lord) ? $planat_position->nakshatra_lord : 'Na' }}
                                        </td>
                                        <td><b>Nakshatra pad</b></td>
                                        <td>
                                            {{ isset($planat_position->nakshatra_pad) ? $planat_position->nakshatra_pad : 'Na' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>House</b></td>
                                        <td>{{ isset($planat_position->house) ? $planat_position->house : 'Na' }}</td>
                                        <td><b>Is combust</b></td>
                                        <td> {{ isset($planat_position->is_combust) ? $planat_position->is_combust : 'Na' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Is planet set</b></td>
                                        <td>@if (isset($planat_position->is_planet_set))
                                            @if ($planat_position->is_planet_set == true)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        @else
                                            Na
                                        @endif</td>
                                        <td><b>Planet awastha</b></td>
                                        <td> {{ isset($planat_position->planet_awastha) ? $planat_position->planet_awastha : 'Na' }}</td>
                                    </tr>
        
                                </tbody>
                            </table> 
                        </td>
                    </tr>
                </tbody>
            </table>
            @endforeach
        @endif
    @endif
</body>
{{-- @php
die();
@endphp --}}

</html>