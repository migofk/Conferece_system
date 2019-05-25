<?php

namespace App\Http\Controllers\frontend;
use App\Http\Traits\actionFunctions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\slider;
use App\country;
use auth;
use DB;
class homeController extends Controller
{
  use actionFunctions;

  public function index()
  {
      $sliders = slider::all();
      DB::table('views')->increment('views',1);

        $views = DB::table('views')->get();
        foreach ($views as $value) {
          $views = $value->views;
        }
      /*  $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
      */

      /*  foreach ($countries as $value) {
        country::create(['country'=> $value]);
      } */

      return view('welcome',compact('sliders','views'));;
  }
  /***************************************************/
  public function packagePage($name)
  {

      $pagename = $name;
      return view($pagename);
  }
  /***************************************************/
  public function inquire_now()
  {

      $countries = country::all();
      return view('inquire_now',compact('sliders','countries'));
  }
  /****************************************************/

 public function store(Request $request)
 {
    // return $request->recaptcha_response;

     // Build POST request:
     $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
     $recaptcha_secret = '6Ldnb6UUAAAAAOiwyFagPC_oKvWJnkWMO3rH82E2';
     $recaptcha_response = $_POST['recaptcha_response'];

     // Make and decode POST request:
     $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
     $recaptcha = json_decode($recaptcha);

     // Take action based on the score returned:
     if ($recaptcha->score >= 0.5) {
         // Verified

     $request->validate([
         'name' => 'required|max:255',
         'phone' => 'required|max:255',
         'email' => 'required|max:255',

     ]);

   $data = $request->except('_token','name_arr','phone_arr','email_arr','name','phone','email','country_id','invitations','status');
   $data_firstAttandent=([
    'name' => $request->name,
    'phone' => $request->phone,
    'email' => $request->email,
    'status' => 2,
    'country_id' => $request->country_id,
   ]);




 // $request->start_at = Carbon::parse($request->start_at)->format('Y-m-d H:i:s');
 // $request->end_at = Carbon::parse($request->end_at)->format('Y-m-d H:i:s');


     //storing parent first attendant and package.
     $data['data']= 2;
     $data['added_by']= auth::user()->id;
     $data['attendant_id'] = $TheID =  $this->saveDB_Data('attendants',$data_firstAttandent);
     //storing package reference is attendant_id
     $this->saveDB_Data('subattendants',$data);
    //creating ticket for parent attendant
  $data_ticket =([
     'status' => 2,
     'attendant_id' => $TheID,
  ]);
  $this->saveDB_Data('tickets',$data_ticket);

     //storing other attendants
  /*   $x= 0;
     foreach($request->name_arr as $nameX){
         if( $nameX != null){
         $data_otherAttendant=([
             'name' => $nameX,
             'phone' => $request->phone_arr[$x],
             'email' => $request->email_arr[$x],
             'status' => $request->status,
             'parent_id'=>$TheID,
             'country_id' => $request->country_id,
            ]);
            $TheID_sub = $this->saveDB_Data('attendants',$data_otherAttendant);
            $data_ticket_sub =([
             'status' => $request->status,
             'parent_attendant' => $TheID,
             'attendant_id' => $TheID_sub,
            ]);
            $this->saveDB_Data('tickets',$data_ticket_sub);
         }
         $x++;
     }*/
    } else {
        // Not verified - show form error
    }

   return redirect(url('inquire_now/?success=1'));
 }
}
