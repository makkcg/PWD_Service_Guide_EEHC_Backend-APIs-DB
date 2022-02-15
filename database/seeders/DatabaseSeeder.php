<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\AboutSound;
use App\Models\AboutVideo;
use App\Models\Branch;
use App\Models\BranchImage;
use App\Models\BranchSound;
use App\Models\BranchVideo;
use App\Models\City;
use App\Models\Country;
use App\Models\Document;
use App\Models\DocumentImage;
use App\Models\DocumentTranslationMedia;
use App\Models\Faq;
use App\Models\FaqImage;
use App\Models\FaqTranslationMedia;
use App\Models\Foundation;
use App\Models\FoundationImage;
use App\Models\FoundationSound;
use App\Models\FoundationVideo;
use App\Models\Procedure;
use App\Models\ProcedureImage;
use App\Models\ProcedureTranslationMedia;
use App\Models\Regulation;
use App\Models\RegulationImage;
use App\Models\RegulationTranslationMedia;
use App\Models\Service;
use App\Models\ServiceImage;
use App\Models\ServiceTranslationMedia;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


         //  $this->seedUsers();
           $this->seedCountry();
           $this->seedState();
           $this->seedCities();
           $this->seedFoundation();
           $this->seedAbout();
           $this->seedBranch();
           $this->seedService();
           $this->spatie();
    }

    private function seedUsers()
    {
        User::factory(15)->create();
    }

    private function seedCountry()
    {
        $entries= '[
            {"id":"1","name_ar":"مصر","name_en":"Egypt"}
            ]';

            foreach (json_decode($entries, true) as $entry) {
                $data = [
                    'ar' => ["name" => $entry["name_ar"]],
                    'en' => ["name" => $entry["name_en"]]
                ];
                Country::factory(1)->state(new Sequence($data))->create();
            }
    }
    private function seedState()
    {
        $entries= '[{"id":"1","name_ar":"القاهرة","name_en":"Cairo"},
        {"id":"2","name_ar":"الجيزة","name_en":"Giza"},
        {"id":"3","name_ar":"الأسكندرية","name_en":"Alexandria"},
        {"id":"4","name_ar":"الدقهلية","name_en":"Dakahlia"},
        {"id":"5","name_ar":"البحر الأحمر","name_en":"Red Sea"},
        {"id":"6","name_ar":"البحيرة","name_en":"Beheira"},
        {"id":"7","name_ar":"الفيوم","name_en":"Fayoum"},
        {"id":"8","name_ar":"الغربية","name_en":"Gharbiya"},
        {"id":"9","name_ar":"الإسماعلية","name_en":"Ismailia"},
        {"id":"10","name_ar":"المنوفية","name_en":"Menofia"},
        {"id":"11","name_ar":"المنيا","name_en":"Minya"},
        {"id":"12","name_ar":"القليوبية","name_en":"Qaliubiya"},
        {"id":"13","name_ar":"الوادي الجديد","name_en":"New Valley"},
        {"id":"14","name_ar":"السويس","name_en":"Suez"},
        {"id":"15","name_ar":"اسوان","name_en":"Aswan"},
        {"id":"16","name_ar":"اسيوط","name_en":"Assiut"},
        {"id":"17","name_ar":"بني سويف","name_en":"Beni Suef"},
        {"id":"18","name_ar":"بورسعيد","name_en":"Port Said"},
        {"id":"19","name_ar":"دمياط","name_en":"Damietta"},
        {"id":"20","name_ar":"الشرقية","name_en":"Sharkia"},
        {"id":"21","name_ar":"جنوب سيناء","name_en":"South Sinai"},
        {"id":"22","name_ar":"كفر الشيخ","name_en":"Kafr Al sheikh"},
        {"id":"23","name_ar":"مطروح","name_en":"Matrouh"},
        {"id":"24","name_ar":"الأقصر","name_en":"Luxor"},
        {"id":"25","name_ar":"قنا","name_en":"Qena"},
        {"id":"26","name_ar":"شمال سيناء","name_en":"North Sinai"},
        {"id":"27","name_ar":"سوهاج","name_en":"Sohag"}
        ]';

        foreach (json_decode($entries, true) as $entry) {
            $data = [
                'ar' => ["name" => $entry["name_ar"]],
                'en' => ["name" => $entry["name_en"]]
            ];
            State::factory(1)->state(new Sequence($data))->create();
        }
    }

    private function seedCities()
    {
        $entries= '[
        {"id":"1","state_id":"1","name_ar":"15 مايو","name_en":"15 May"},
        {"id":"2","state_id":"1","name_ar":"الازبكية","name_en":"Al Azbakeyah"},
        {"id":"3","state_id":"1","name_ar":"البساتين","name_en":"Al Basatin"},
        {"id":"4","state_id":"1","name_ar":"التبين","name_en":"Tebin"},
        {"id":"5","state_id":"1","name_ar":"الخليفة","name_en":"El-Khalifa"},
        {"id":"6","state_id":"1","name_ar":"الدراسة","name_en":"El darrasa"},
        {"id":"7","state_id":"1","name_ar":"الدرب الاحمر","name_en":"Aldarb Alahmar"},
        {"id":"8","state_id":"1","name_ar":"الزاوية الحمراء","name_en":"Zawya al-Hamra"},
        {"id":"9","state_id":"1","name_ar":"الزيتون","name_en":"El-Zaytoun"},
        {"id":"10","state_id":"1","name_ar":"الساحل","name_en":"Sahel"},
        {"id":"11","state_id":"1","name_ar":"السلام","name_en":"El Salam"},
        {"id":"12","state_id":"1","name_ar":"السيدة زينب","name_en":"Sayeda Zeinab"},
        {"id":"13","state_id":"1","name_ar":"الشرابية","name_en":"El Sharabeya"},
        {"id":"14","state_id":"1","name_ar":"مدينة الشروق","name_en":"Shorouk"},
        {"id":"15","state_id":"1","name_ar":"الظاهر","name_en":"El Daher"},
        {"id":"16","state_id":"1","name_ar":"العتبة","name_en":"Ataba"},
        {"id":"17","state_id":"1","name_ar":"القاهرة الجديدة","name_en":"New Cairo"},
        {"id":"18","state_id":"1","name_ar":"المرج","name_en":"El Marg"},
        {"id":"19","state_id":"1","name_ar":"عزبة النخل","name_en":"Ezbet el Nakhl"},
        {"id":"20","state_id":"1","name_ar":"المطرية","name_en":"Matareya"},
        {"id":"21","state_id":"1","name_ar":"المعادى","name_en":"Maadi"},
        {"id":"22","state_id":"1","name_ar":"المعصرة","name_en":"Maasara"},
        {"id":"23","state_id":"1","name_ar":"المقطم","name_en":"Mokattam"},
        {"id":"24","state_id":"1","name_ar":"المنيل","name_en":"Manyal"},
        {"id":"25","state_id":"1","name_ar":"الموسكى","name_en":"Mosky"},
        {"id":"26","state_id":"1","name_ar":"النزهة","name_en":"Nozha"},
        {"id":"27","state_id":"1","name_ar":"الوايلى","name_en":"Waily"},
        {"id":"28","state_id":"1","name_ar":"باب الشعرية","name_en":"Bab al-Shereia"},
        {"id":"29","state_id":"1","name_ar":"بولاق","name_en":"Bolaq"},
        {"id":"30","state_id":"1","name_ar":"جاردن سيتى","name_en":"Garden City"},
        {"id":"31","state_id":"1","name_ar":"حدائق القبة","name_en":"Hadayek El-Kobba"},
        {"id":"32","state_id":"1","name_ar":"حلوان","name_en":"Helwan"},
        {"id":"33","state_id":"1","name_ar":"دار السلام","name_en":"Dar Al Salam"},
        {"id":"34","state_id":"1","name_ar":"شبرا","name_en":"Shubra"},
        {"id":"35","state_id":"1","name_ar":"طره","name_en":"Tura"},
        {"id":"36","state_id":"1","name_ar":"عابدين","name_en":"Abdeen"},
        {"id":"37","state_id":"1","name_ar":"عباسية","name_en":"Abaseya"},
        {"id":"38","state_id":"1","name_ar":"عين شمس","name_en":"Ain Shams"},
        {"id":"39","state_id":"1","name_ar":"مدينة نصر","name_en":"Nasr City"},
        {"id":"40","state_id":"1","name_ar":"مصر الجديدة","name_en":"New Heliopolis"},
        {"id":"41","state_id":"1","name_ar":"مصر القديمة","name_en":"Masr Al Qadima"},
        {"id":"42","state_id":"1","name_ar":"منشية ناصر","name_en":"Mansheya Nasir"},
        {"id":"43","state_id":"1","name_ar":"مدينة بدر","name_en":"Badr City"},
        {"id":"44","state_id":"1","name_ar":"مدينة العبور","name_en":"Obour City"},
        {"id":"45","state_id":"1","name_ar":"وسط البلد","name_en":"Cairo Downtown"},
        {"id":"46","state_id":"1","name_ar":"الزمالك","name_en":"Zamalek"},
        {"id":"47","state_id":"1","name_ar":"قصر النيل","name_en":"Kasr El Nile"},
        {"id":"48","state_id":"1","name_ar":"الرحاب","name_en":"Rehab"},
        {"id":"49","state_id":"1","name_ar":"القطامية","name_en":"Katameya"},
        {"id":"50","state_id":"1","name_ar":"مدينتي","name_en":"Madinty"},
        {"id":"51","state_id":"1","name_ar":"روض الفرج","name_en":"Rod Alfarag"},
        {"id":"52","state_id":"1","name_ar":"شيراتون","name_en":"Sheraton"},
        {"id":"53","state_id":"1","name_ar":"الجمالية","name_en":"El-Gamaleya"},
        {"id":"54","state_id":"1","name_ar":"العاشر من رمضان","name_en":"10th of Ramadan City"},
        {"id":"55","state_id":"1","name_ar":"الحلمية","name_en":"Helmeyat Alzaytoun"},
        {"id":"56","state_id":"1","name_ar":"النزهة الجديدة","name_en":"New Nozha"},
        {"id":"57","state_id":"1","name_ar":"العاصمة الإدارية","name_en":"Capital New"},
        {"id":"58","state_id":"2","name_ar":"الجيزة","name_en":"Giza"},
        {"id":"59","state_id":"2","name_ar":"السادس من أكتوبر","name_en":"Sixth of October"},
        {"id":"60","state_id":"2","name_ar":"الشيخ زايد","name_en":"Cheikh Zayed"},
        {"id":"61","state_id":"2","name_ar":"الحوامدية","name_en":"Hawamdiyah"},
        {"id":"62","state_id":"2","name_ar":"البدرشين","name_en":"Al Badrasheen"},
        {"id":"63","state_id":"2","name_ar":"الصف","name_en":"Saf"},
        {"id":"64","state_id":"2","name_ar":"أطفيح","name_en":"Atfih"},
        {"id":"65","state_id":"2","name_ar":"العياط","name_en":"Al Ayat"},
        {"id":"66","state_id":"2","name_ar":"الباويطي","name_en":"Al-Bawaiti"},
        {"id":"67","state_id":"2","name_ar":"منشأة القناطر","name_en":"ManshiyetAl Qanater"},
        {"id":"68","state_id":"2","name_ar":"أوسيم","name_en":"Oaseem"},
        {"id":"69","state_id":"2","name_ar":"كرداسة","name_en":"Kerdasa"},
        {"id":"70","state_id":"2","name_ar":"أبو النمرس","name_en":"Abu Nomros"},
        {"id":"71","state_id":"2","name_ar":"كفر غطاطي","name_en":"Kafr Ghati"},
        {"id":"72","state_id":"2","name_ar":"منشأة البكاري","name_en":"Manshiyet Al Bakari"},
        {"id":"73","state_id":"2","name_ar":"الدقى","name_en":"Dokki"},
        {"id":"74","state_id":"2","name_ar":"العجوزة","name_en":"Agouza"},
        {"id":"75","state_id":"2","name_ar":"الهرم","name_en":"Haram"},
        {"id":"76","state_id":"2","name_ar":"الوراق","name_en":"Warraq"},
        {"id":"77","state_id":"2","name_ar":"امبابة","name_en":"Imbaba"},
        {"id":"78","state_id":"2","name_ar":"بولاق الدكرور","name_en":"Boulaq Dakrour"},
        {"id":"79","state_id":"2","name_ar":"الواحات البحرية","name_en":"Al Wahat Al Baharia"},
        {"id":"80","state_id":"2","name_ar":"العمرانية","name_en":"Omraneya"},
        {"id":"81","state_id":"2","name_ar":"المنيب","name_en":"Moneeb"},
        {"id":"82","state_id":"2","name_ar":"بين السرايات","name_en":"Bin Alsarayat"},
        {"id":"83","state_id":"2","name_ar":"الكيت كات","name_en":"Kit Kat"},
        {"id":"84","state_id":"2","name_ar":"المهندسين","name_en":"Mohandessin"},
        {"id":"85","state_id":"2","name_ar":"فيصل","name_en":"Faisal"},
        {"id":"86","state_id":"2","name_ar":"أبو رواش","name_en":"Abu Rawash"},
        {"id":"87","state_id":"2","name_ar":"حدائق الأهرام","name_en":"Hadayek Alahram"},
        {"id":"88","state_id":"2","name_ar":"الحرانية","name_en":"Haraneya"},
        {"id":"89","state_id":"2","name_ar":"حدائق اكتوبر","name_en":"Hadayek October"},
        {"id":"90","state_id":"2","name_ar":"صفط اللبن","name_en":"Saft Allaban"},
        {"id":"91","state_id":"2","name_ar":"القرية الذكية","name_en":"Smart Village"},
        {"id":"92","state_id":"2","name_ar":"ارض اللواء","name_en":"Ard Ellwaa"},
        {"id":"93","state_id":"3","name_ar":"ابو قير","name_en":"Abu Qir"},
        {"id":"94","state_id":"3","name_ar":"الابراهيمية","name_en":"Al Ibrahimeyah"},
        {"id":"95","state_id":"3","name_ar":"الأزاريطة","name_en":"Azarita"},
        {"id":"96","state_id":"3","name_ar":"الانفوشى","name_en":"Anfoushi"},
        {"id":"97","state_id":"3","name_ar":"الدخيلة","name_en":"Dekheila"},
        {"id":"98","state_id":"3","name_ar":"السيوف","name_en":"El Soyof"},
        {"id":"99","state_id":"3","name_ar":"العامرية","name_en":"Ameria"},
        {"id":"100","state_id":"3","name_ar":"اللبان","name_en":"El Labban"},
        {"id":"101","state_id":"3","name_ar":"المفروزة","name_en":"Al Mafrouza"},
        {"id":"102","state_id":"3","name_ar":"المنتزه","name_en":"El Montaza"},
        {"id":"103","state_id":"3","name_ar":"المنشية","name_en":"Mansheya"},
        {"id":"104","state_id":"3","name_ar":"الناصرية","name_en":"Naseria"},
        {"id":"105","state_id":"3","name_ar":"امبروزو","name_en":"Ambrozo"},
        {"id":"106","state_id":"3","name_ar":"باب شرق","name_en":"Bab Sharq"},
        {"id":"107","state_id":"3","name_ar":"برج العرب","name_en":"Bourj Alarab"},
        {"id":"108","state_id":"3","name_ar":"ستانلى","name_en":"Stanley"},
        {"id":"109","state_id":"3","name_ar":"سموحة","name_en":"Smouha"},
        {"id":"110","state_id":"3","name_ar":"سيدى بشر","name_en":"Sidi Bishr"},
        {"id":"111","state_id":"3","name_ar":"شدس","name_en":"Shads"},
        {"id":"112","state_id":"3","name_ar":"غيط العنب","name_en":"Gheet Alenab"},
        {"id":"113","state_id":"3","name_ar":"فلمينج","name_en":"Fleming"},
        {"id":"114","state_id":"3","name_ar":"فيكتوريا","name_en":"Victoria"},
        {"id":"115","state_id":"3","name_ar":"كامب شيزار","name_en":"Camp Shizar"},
        {"id":"116","state_id":"3","name_ar":"كرموز","name_en":"Karmooz"},
        {"id":"117","state_id":"3","name_ar":"محطة الرمل","name_en":"Mahta Alraml"},
        {"id":"118","state_id":"3","name_ar":"مينا البصل","name_en":"Mina El-Basal"},
        {"id":"119","state_id":"3","name_ar":"العصافرة","name_en":"Asafra"},
        {"id":"120","state_id":"3","name_ar":"العجمي","name_en":"Agamy"},
        {"id":"121","state_id":"3","name_ar":"بكوس","name_en":"Bakos"},
        {"id":"122","state_id":"3","name_ar":"بولكلي","name_en":"Boulkly"},
        {"id":"123","state_id":"3","name_ar":"كليوباترا","name_en":"Cleopatra"},
        {"id":"124","state_id":"3","name_ar":"جليم","name_en":"Glim"},
        {"id":"125","state_id":"3","name_ar":"المعمورة","name_en":"Al Mamurah"},
        {"id":"126","state_id":"3","name_ar":"المندرة","name_en":"Al Mandara"},
        {"id":"127","state_id":"3","name_ar":"محرم بك","name_en":"Moharam Bek"},
        {"id":"128","state_id":"3","name_ar":"الشاطبي","name_en":"Elshatby"},
        {"id":"129","state_id":"3","name_ar":"سيدي جابر","name_en":"Sidi Gaber"},
        {"id":"130","state_id":"3","name_ar":"الساحل الشمالي","name_en":"North Coast\/sahel"},
        {"id":"131","state_id":"3","name_ar":"الحضرة","name_en":"Alhadra"},
        {"id":"132","state_id":"3","name_ar":"العطارين","name_en":"Alattarin"},
        {"id":"133","state_id":"3","name_ar":"سيدي كرير","name_en":"Sidi Kerir"},
        {"id":"134","state_id":"3","name_ar":"الجمرك","name_en":"Elgomrok"},
        {"id":"135","state_id":"3","name_ar":"المكس","name_en":"Al Max"},
        {"id":"136","state_id":"3","name_ar":"مارينا","name_en":"Marina"},
        {"id":"137","state_id":"4","name_ar":"المنصورة","name_en":"Mansoura"},
        {"id":"138","state_id":"4","name_ar":"طلخا","name_en":"Talkha"},
        {"id":"139","state_id":"4","name_ar":"ميت غمر","name_en":"Mitt Ghamr"},
        {"id":"140","state_id":"4","name_ar":"دكرنس","name_en":"Dekernes"},
        {"id":"141","state_id":"4","name_ar":"أجا","name_en":"Aga"},
        {"id":"142","state_id":"4","name_ar":"منية النصر","name_en":"Menia El Nasr"},
        {"id":"143","state_id":"4","name_ar":"السنبلاوين","name_en":"Sinbillawin"},
        {"id":"144","state_id":"4","name_ar":"الكردي","name_en":"El Kurdi"},
        {"id":"145","state_id":"4","name_ar":"بني عبيد","name_en":"Bani Ubaid"},
        {"id":"146","state_id":"4","name_ar":"المنزلة","name_en":"Al Manzala"},
        {"id":"147","state_id":"4","name_ar":"تمي الأمديد","name_en":"tami al amdid"},
        {"id":"148","state_id":"4","name_ar":"الجمالية","name_en":"aljamalia"},
        {"id":"149","state_id":"4","name_ar":"شربين","name_en":"Sherbin"},
        {"id":"150","state_id":"4","name_ar":"المطرية","name_en":"Mataria"},
        {"id":"151","state_id":"4","name_ar":"بلقاس","name_en":"Belqas"},
        {"id":"152","state_id":"4","name_ar":"ميت سلسيل","name_en":"Meet Salsil"},
        {"id":"153","state_id":"4","name_ar":"جمصة","name_en":"Gamasa"},
        {"id":"154","state_id":"4","name_ar":"محلة دمنة","name_en":"Mahalat Damana"},
        {"id":"155","state_id":"4","name_ar":"نبروه","name_en":"Nabroh"},
        {"id":"156","state_id":"5","name_ar":"الغردقة","name_en":"Hurghada"},
        {"id":"157","state_id":"5","name_ar":"رأس غارب","name_en":"Ras Ghareb"},
        {"id":"158","state_id":"5","name_ar":"سفاجا","name_en":"Safaga"},
        {"id":"159","state_id":"5","name_ar":"القصير","name_en":"El Qusiar"},
        {"id":"160","state_id":"5","name_ar":"مرسى علم","name_en":"Marsa Alam"},
        {"id":"161","state_id":"5","name_ar":"الشلاتين","name_en":"Shalatin"},
        {"id":"162","state_id":"5","name_ar":"حلايب","name_en":"Halaib"},
        {"id":"163","state_id":"5","name_ar":"الدهار","name_en":"Aldahar"},
        {"id":"164","state_id":"6","name_ar":"دمنهور","name_en":"Damanhour"},
        {"id":"165","state_id":"6","name_ar":"كفر الدوار","name_en":"Kafr El Dawar"},
        {"id":"166","state_id":"6","name_ar":"رشيد","name_en":"Rashid"},
        {"id":"167","state_id":"6","name_ar":"إدكو","name_en":"Edco"},
        {"id":"168","state_id":"6","name_ar":"أبو المطامير","name_en":"Abu al-Matamir"},
        {"id":"169","state_id":"6","name_ar":"أبو حمص","name_en":"Abu Homs"},
        {"id":"170","state_id":"6","name_ar":"الدلنجات","name_en":"Delengat"},
        {"id":"171","state_id":"6","name_ar":"المحمودية","name_en":"Mahmoudiyah"},
        {"id":"172","state_id":"6","name_ar":"الرحمانية","name_en":"Rahmaniyah"},
        {"id":"173","state_id":"6","name_ar":"إيتاي البارود","name_en":"Itai Baroud"},
        {"id":"174","state_id":"6","name_ar":"حوش عيسى","name_en":"Housh Eissa"},
        {"id":"175","state_id":"6","name_ar":"شبراخيت","name_en":"Shubrakhit"},
        {"id":"176","state_id":"6","name_ar":"كوم حمادة","name_en":"Kom Hamada"},
        {"id":"177","state_id":"6","name_ar":"بدر","name_en":"Badr"},
        {"id":"178","state_id":"6","name_ar":"وادي النطرون","name_en":"Wadi Natrun"},
        {"id":"179","state_id":"6","name_ar":"النوبارية الجديدة","name_en":"New Nubaria"},
        {"id":"180","state_id":"6","name_ar":"النوبارية","name_en":"Alnoubareya"},
        {"id":"181","state_id":"7","name_ar":"الفيوم","name_en":"Fayoum"},
        {"id":"182","state_id":"7","name_ar":"الفيوم الجديدة","name_en":"Fayoum El Gedida"},
        {"id":"183","state_id":"7","name_ar":"طامية","name_en":"Tamiya"},
        {"id":"184","state_id":"7","name_ar":"سنورس","name_en":"Snores"},
        {"id":"185","state_id":"7","name_ar":"إطسا","name_en":"Etsa"},
        {"id":"186","state_id":"7","name_ar":"إبشواي","name_en":"Epschway"},
        {"id":"187","state_id":"7","name_ar":"يوسف الصديق","name_en":"Yusuf El Sediaq"},
        {"id":"188","state_id":"7","name_ar":"الحادقة","name_en":"Hadqa"},
        {"id":"189","state_id":"7","name_ar":"اطسا","name_en":"Atsa"},
        {"id":"190","state_id":"7","name_ar":"الجامعة","name_en":"Algamaa"},
        {"id":"191","state_id":"7","name_ar":"السيالة","name_en":"Sayala"},
        {"id":"192","state_id":"8","name_ar":"طنطا","name_en":"Tanta"},
        {"id":"193","state_id":"8","name_ar":"المحلة الكبرى","name_en":"Al Mahalla Al Kobra"},
        {"id":"194","state_id":"8","name_ar":"كفر الزيات","name_en":"Kafr El Zayat"},
        {"id":"195","state_id":"8","name_ar":"زفتى","name_en":"Zefta"},
        {"id":"196","state_id":"8","name_ar":"السنطة","name_en":"El Santa"},
        {"id":"197","state_id":"8","name_ar":"قطور","name_en":"Qutour"},
        {"id":"198","state_id":"8","name_ar":"بسيون","name_en":"Basion"},
        {"id":"199","state_id":"8","name_ar":"سمنود","name_en":"Samannoud"},
        {"id":"200","state_id":"9","name_ar":"الإسماعيلية","name_en":"Ismailia"},
        {"id":"201","state_id":"9","name_ar":"فايد","name_en":"Fayed"},
        {"id":"202","state_id":"9","name_ar":"القنطرة شرق","name_en":"Qantara Sharq"},
        {"id":"203","state_id":"9","name_ar":"القنطرة غرب","name_en":"Qantara Gharb"},
        {"id":"204","state_id":"9","name_ar":"التل الكبير","name_en":"El Tal El Kabier"},
        {"id":"205","state_id":"9","name_ar":"أبو صوير","name_en":"Abu Sawir"},
        {"id":"206","state_id":"9","name_ar":"القصاصين الجديدة","name_en":"Kasasien El Gedida"},
        {"id":"207","state_id":"9","name_ar":"نفيشة","name_en":"Nefesha"},
        {"id":"208","state_id":"9","name_ar":"الشيخ زايد","name_en":"Sheikh Zayed"},
        {"id":"209","state_id":"10","name_ar":"شبين الكوم","name_en":"Shbeen El Koom"},
        {"id":"210","state_id":"10","name_ar":"مدينة السادات","name_en":"Sadat City"},
        {"id":"211","state_id":"10","name_ar":"منوف","name_en":"Menouf"},
        {"id":"212","state_id":"10","name_ar":"سرس الليان","name_en":"Sars El-Layan"},
        {"id":"213","state_id":"10","name_ar":"أشمون","name_en":"Ashmon"},
        {"id":"214","state_id":"10","name_ar":"الباجور","name_en":"Al Bagor"},
        {"id":"215","state_id":"10","name_ar":"قويسنا","name_en":"Quesna"},
        {"id":"216","state_id":"10","name_ar":"بركة السبع","name_en":"Berkat El Saba"},
        {"id":"217","state_id":"10","name_ar":"تلا","name_en":"Tala"},
        {"id":"218","state_id":"10","name_ar":"الشهداء","name_en":"Al Shohada"},
        {"id":"219","state_id":"11","name_ar":"المنيا","name_en":"Minya"},
        {"id":"220","state_id":"11","name_ar":"المنيا الجديدة","name_en":"Minya El Gedida"},
        {"id":"221","state_id":"11","name_ar":"العدوة","name_en":"El Adwa"},
        {"id":"222","state_id":"11","name_ar":"مغاغة","name_en":"Magagha"},
        {"id":"223","state_id":"11","name_ar":"بني مزار","name_en":"Bani Mazar"},
        {"id":"224","state_id":"11","name_ar":"مطاي","name_en":"Mattay"},
        {"id":"225","state_id":"11","name_ar":"سمالوط","name_en":"Samalut"},
        {"id":"226","state_id":"11","name_ar":"المدينة الفكرية","name_en":"Madinat El Fekria"},
        {"id":"227","state_id":"11","name_ar":"ملوي","name_en":"Meloy"},
        {"id":"228","state_id":"11","name_ar":"دير مواس","name_en":"Deir Mawas"},
        {"id":"229","state_id":"11","name_ar":"ابو قرقاص","name_en":"Abu Qurqas"},
        {"id":"230","state_id":"11","name_ar":"ارض سلطان","name_en":"Ard Sultan"},
        {"id":"231","state_id":"12","name_ar":"بنها","name_en":"Banha"},
        {"id":"232","state_id":"12","name_ar":"قليوب","name_en":"Qalyub"},
        {"id":"233","state_id":"12","name_ar":"شبرا الخيمة","name_en":"Shubra Al Khaimah"},
        {"id":"234","state_id":"12","name_ar":"القناطر الخيرية","name_en":"Al Qanater Charity"},
        {"id":"235","state_id":"12","name_ar":"الخانكة","name_en":"Khanka"},
        {"id":"236","state_id":"12","name_ar":"كفر شكر","name_en":"Kafr Shukr"},
        {"id":"237","state_id":"12","name_ar":"طوخ","name_en":"Tukh"},
        {"id":"238","state_id":"12","name_ar":"قها","name_en":"Qaha"},
        {"id":"239","state_id":"12","name_ar":"العبور","name_en":"Obour"},
        {"id":"240","state_id":"12","name_ar":"الخصوص","name_en":"Khosous"},
        {"id":"241","state_id":"12","name_ar":"شبين القناطر","name_en":"Shibin Al Qanater"},
        {"id":"242","state_id":"12","name_ar":"مسطرد","name_en":"Mostorod"},
        {"id":"243","state_id":"13","name_ar":"الخارجة","name_en":"El Kharga"},
        {"id":"244","state_id":"13","name_ar":"باريس","name_en":"Paris"},
        {"id":"245","state_id":"13","name_ar":"موط","name_en":"Mout"},
        {"id":"246","state_id":"13","name_ar":"الفرافرة","name_en":"Farafra"},
        {"id":"247","state_id":"13","name_ar":"بلاط","name_en":"Balat"},
        {"id":"248","state_id":"13","name_ar":"الداخلة","name_en":"Dakhla"},
        {"id":"249","state_id":"14","name_ar":"السويس","name_en":"Suez"},
        {"id":"250","state_id":"14","name_ar":"الجناين","name_en":"Alganayen"},
        {"id":"251","state_id":"14","name_ar":"عتاقة","name_en":"Ataqah"},
        {"id":"252","state_id":"14","name_ar":"العين السخنة","name_en":"Ain Sokhna"},
        {"id":"253","state_id":"14","name_ar":"فيصل","name_en":"Faysal"},
        {"id":"254","state_id":"15","name_ar":"أسوان","name_en":"Aswan"},
        {"id":"255","state_id":"15","name_ar":"أسوان الجديدة","name_en":"Aswan El Gedida"},
        {"id":"256","state_id":"15","name_ar":"دراو","name_en":"Drau"},
        {"id":"257","state_id":"15","name_ar":"كوم أمبو","name_en":"Kom Ombo"},
        {"id":"258","state_id":"15","name_ar":"نصر النوبة","name_en":"Nasr Al Nuba"},
        {"id":"259","state_id":"15","name_ar":"كلابشة","name_en":"Kalabsha"},
        {"id":"260","state_id":"15","name_ar":"إدفو","name_en":"Edfu"},
        {"id":"261","state_id":"15","name_ar":"الرديسية","name_en":"Al-Radisiyah"},
        {"id":"262","state_id":"15","name_ar":"البصيلية","name_en":"Al Basilia"},
        {"id":"263","state_id":"15","name_ar":"السباعية","name_en":"Al Sibaeia"},
        {"id":"264","state_id":"15","name_ar":"ابوسمبل السياحية","name_en":"Abo Simbl Al Siyahia"},
        {"id":"265","state_id":"15","name_ar":"مرسى علم","name_en":"Marsa Alam"},
        {"id":"266","state_id":"16","name_ar":"أسيوط","name_en":"Assiut"},
        {"id":"267","state_id":"16","name_ar":"أسيوط الجديدة","name_en":"Assiut El Gedida"},
        {"id":"268","state_id":"16","name_ar":"ديروط","name_en":"Dayrout"},
        {"id":"269","state_id":"16","name_ar":"منفلوط","name_en":"Manfalut"},
        {"id":"270","state_id":"16","name_ar":"القوصية","name_en":"Qusiya"},
        {"id":"271","state_id":"16","name_ar":"أبنوب","name_en":"Abnoub"},
        {"id":"272","state_id":"16","name_ar":"أبو تيج","name_en":"Abu Tig"},
        {"id":"273","state_id":"16","name_ar":"الغنايم","name_en":"El Ghanaim"},
        {"id":"274","state_id":"16","name_ar":"ساحل سليم","name_en":"Sahel Selim"},
        {"id":"275","state_id":"16","name_ar":"البداري","name_en":"El Badari"},
        {"id":"276","state_id":"16","name_ar":"صدفا","name_en":"Sidfa"},
        {"id":"277","state_id":"17","name_ar":"بني سويف","name_en":"Bani Sweif"},
        {"id":"278","state_id":"17","name_ar":"بني سويف الجديدة","name_en":"Beni Suef El Gedida"},
        {"id":"279","state_id":"17","name_ar":"الواسطى","name_en":"Al Wasta"},
        {"id":"280","state_id":"17","name_ar":"ناصر","name_en":"Naser"},
        {"id":"281","state_id":"17","name_ar":"إهناسيا","name_en":"Ehnasia"},
        {"id":"282","state_id":"17","name_ar":"ببا","name_en":"beba"},
        {"id":"283","state_id":"17","name_ar":"الفشن","name_en":"Fashn"},
        {"id":"284","state_id":"17","name_ar":"سمسطا","name_en":"Somasta"},
        {"id":"285","state_id":"17","name_ar":"الاباصيرى","name_en":"Alabbaseri"},
        {"id":"286","state_id":"17","name_ar":"مقبل","name_en":"Mokbel"},
        {"id":"287","state_id":"18","name_ar":"بورسعيد","name_en":"PorSaid"},
        {"id":"288","state_id":"18","name_ar":"بورفؤاد","name_en":"Port Fouad"},
        {"id":"289","state_id":"18","name_ar":"العرب","name_en":"Alarab"},
        {"id":"290","state_id":"18","name_ar":"حى الزهور","name_en":"Zohour"},
        {"id":"291","state_id":"18","name_ar":"حى الشرق","name_en":"Alsharq"},
        {"id":"292","state_id":"18","name_ar":"حى الضواحى","name_en":"Aldawahi"},
        {"id":"293","state_id":"18","name_ar":"حى المناخ","name_en":"Almanakh"},
        {"id":"294","state_id":"18","name_ar":"حى مبارك","name_en":"Mubarak"},
        {"id":"295","state_id":"19","name_ar":"دمياط","name_en":"Damietta"},
        {"id":"296","state_id":"19","name_ar":"دمياط الجديدة","name_en":"New Damietta"},
        {"id":"297","state_id":"19","name_ar":"رأس البر","name_en":"Ras El Bar"},
        {"id":"298","state_id":"19","name_ar":"فارسكور","name_en":"Faraskour"},
        {"id":"299","state_id":"19","name_ar":"الزرقا","name_en":"Zarqa"},
        {"id":"300","state_id":"19","name_ar":"السرو","name_en":"alsaru"},
        {"id":"301","state_id":"19","name_ar":"الروضة","name_en":"alruwda"},
        {"id":"302","state_id":"19","name_ar":"كفر البطيخ","name_en":"Kafr El-Batikh"},
        {"id":"303","state_id":"19","name_ar":"عزبة البرج","name_en":"Azbet Al Burg"},
        {"id":"304","state_id":"19","name_ar":"ميت أبو غالب","name_en":"Meet Abou Ghalib"},
        {"id":"305","state_id":"19","name_ar":"كفر سعد","name_en":"Kafr Saad"},
        {"id":"306","state_id":"20","name_ar":"الزقازيق","name_en":"Zagazig"},
        {"id":"307","state_id":"20","name_ar":"العاشر من رمضان","name_en":"Al Ashr Men Ramadan"},
        {"id":"308","state_id":"20","name_ar":"منيا القمح","name_en":"Minya Al Qamh"},
        {"id":"309","state_id":"20","name_ar":"بلبيس","name_en":"Belbeis"},
        {"id":"310","state_id":"20","name_ar":"مشتول السوق","name_en":"Mashtoul El Souq"},
        {"id":"311","state_id":"20","name_ar":"القنايات","name_en":"Qenaiat"},
        {"id":"312","state_id":"20","name_ar":"أبو حماد","name_en":"Abu Hammad"},
        {"id":"313","state_id":"20","name_ar":"القرين","name_en":"El Qurain"},
        {"id":"314","state_id":"20","name_ar":"ههيا","name_en":"Hehia"},
        {"id":"315","state_id":"20","name_ar":"أبو كبير","name_en":"Abu Kabir"},
        {"id":"316","state_id":"20","name_ar":"فاقوس","name_en":"Faccus"},
        {"id":"317","state_id":"20","name_ar":"الصالحية الجديدة","name_en":"El Salihia El Gedida"},
        {"id":"318","state_id":"20","name_ar":"الإبراهيمية","name_en":"Al Ibrahimiyah"},
        {"id":"319","state_id":"20","name_ar":"ديرب نجم","name_en":"Deirb Negm"},
        {"id":"320","state_id":"20","name_ar":"كفر صقر","name_en":"Kafr Saqr"},
        {"id":"321","state_id":"20","name_ar":"أولاد صقر","name_en":"Awlad Saqr"},
        {"id":"322","state_id":"20","name_ar":"الحسينية","name_en":"Husseiniya"},
        {"id":"323","state_id":"20","name_ar":"صان الحجر القبلية","name_en":"san alhajar alqablia"},
        {"id":"324","state_id":"20","name_ar":"منشأة أبو عمر","name_en":"Manshayat Abu Omar"},
        {"id":"325","state_id":"21","name_ar":"الطور","name_en":"Al Toor"},
        {"id":"326","state_id":"21","name_ar":"شرم الشيخ","name_en":"Sharm El-Shaikh"},
        {"id":"327","state_id":"21","name_ar":"دهب","name_en":"Dahab"},
        {"id":"328","state_id":"21","name_ar":"نويبع","name_en":"Nuweiba"},
        {"id":"329","state_id":"21","name_ar":"طابا","name_en":"Taba"},
        {"id":"330","state_id":"21","name_ar":"سانت كاترين","name_en":"Saint Catherine"},
        {"id":"331","state_id":"21","name_ar":"أبو رديس","name_en":"Abu Redis"},
        {"id":"332","state_id":"21","name_ar":"أبو زنيمة","name_en":"Abu Zenaima"},
        {"id":"333","state_id":"21","name_ar":"رأس سدر","name_en":"Ras Sidr"},
        {"id":"334","state_id":"22","name_ar":"كفر الشيخ","name_en":"Kafr El Sheikh"},
        {"id":"335","state_id":"22","name_ar":"وسط البلد كفر الشيخ","name_en":"Kafr El Sheikh Downtown"},
        {"id":"336","state_id":"22","name_ar":"دسوق","name_en":"Desouq"},
        {"id":"337","state_id":"22","name_ar":"فوه","name_en":"Fooh"},
        {"id":"338","state_id":"22","name_ar":"مطوبس","name_en":"Metobas"},
        {"id":"339","state_id":"22","name_ar":"برج البرلس","name_en":"Burg Al Burullus"},
        {"id":"340","state_id":"22","name_ar":"بلطيم","name_en":"Baltim"},
        {"id":"341","state_id":"22","name_ar":"مصيف بلطيم","name_en":"Masief Baltim"},
        {"id":"342","state_id":"22","name_ar":"الحامول","name_en":"Hamol"},
        {"id":"343","state_id":"22","name_ar":"بيلا","name_en":"Bella"},
        {"id":"344","state_id":"22","name_ar":"الرياض","name_en":"Riyadh"},
        {"id":"345","state_id":"22","name_ar":"سيدي سالم","name_en":"Sidi Salm"},
        {"id":"346","state_id":"22","name_ar":"قلين","name_en":"Qellen"},
        {"id":"347","state_id":"22","name_ar":"سيدي غازي","name_en":"Sidi Ghazi"},
        {"id":"348","state_id":"23","name_ar":"مرسى مطروح","name_en":"Marsa Matrouh"},
        {"id":"349","state_id":"23","name_ar":"الحمام","name_en":"El Hamam"},
        {"id":"350","state_id":"23","name_ar":"العلمين","name_en":"Alamein"},
        {"id":"351","state_id":"23","name_ar":"الضبعة","name_en":"Dabaa"},
        {"id":"352","state_id":"23","name_ar":"النجيلة","name_en":"Al-Nagila"},
        {"id":"353","state_id":"23","name_ar":"سيدي براني","name_en":"Sidi Brani"},
        {"id":"354","state_id":"23","name_ar":"السلوم","name_en":"Salloum"},
        {"id":"355","state_id":"23","name_ar":"سيوة","name_en":"Siwa"},
        {"id":"356","state_id":"23","name_ar":"مارينا","name_en":"Marina"},
        {"id":"357","state_id":"23","name_ar":"الساحل الشمالى","name_en":"North Coast"},
        {"id":"358","state_id":"24","name_ar":"الأقصر","name_en":"Luxor"},
        {"id":"359","state_id":"24","name_ar":"الأقصر الجديدة","name_en":"New Luxor"},
        {"id":"360","state_id":"24","name_ar":"إسنا","name_en":"Esna"},
        {"id":"361","state_id":"24","name_ar":"طيبة الجديدة","name_en":"New Tiba"},
        {"id":"362","state_id":"24","name_ar":"الزينية","name_en":"Al ziynia"},
        {"id":"363","state_id":"24","name_ar":"البياضية","name_en":"Al Bayadieh"},
        {"id":"364","state_id":"24","name_ar":"القرنة","name_en":"Al Qarna"},
        {"id":"365","state_id":"24","name_ar":"أرمنت","name_en":"Armant"},
        {"id":"366","state_id":"24","name_ar":"الطود","name_en":"Al Tud"},
        {"id":"367","state_id":"25","name_ar":"قنا","name_en":"Qena"},
        {"id":"368","state_id":"25","name_ar":"قنا الجديدة","name_en":"New Qena"},
        {"id":"369","state_id":"25","name_ar":"ابو طشت","name_en":"Abu Tesht"},
        {"id":"370","state_id":"25","name_ar":"نجع حمادي","name_en":"Nag Hammadi"},
        {"id":"371","state_id":"25","name_ar":"دشنا","name_en":"Deshna"},
        {"id":"372","state_id":"25","name_ar":"الوقف","name_en":"Alwaqf"},
        {"id":"373","state_id":"25","name_ar":"قفط","name_en":"Qaft"},
        {"id":"374","state_id":"25","name_ar":"نقادة","name_en":"Naqada"},
        {"id":"375","state_id":"25","name_ar":"فرشوط","name_en":"Farshout"},
        {"id":"376","state_id":"25","name_ar":"قوص","name_en":"Quos"},
        {"id":"377","state_id":"26","name_ar":"العريش","name_en":"Arish"},
        {"id":"378","state_id":"26","name_ar":"الشيخ زويد","name_en":"Sheikh Zowaid"},
        {"id":"379","state_id":"26","name_ar":"نخل","name_en":"Nakhl"},
        {"id":"380","state_id":"26","name_ar":"رفح","name_en":"Rafah"},
        {"id":"381","state_id":"26","name_ar":"بئر العبد","name_en":"Bir al-Abed"},
        {"id":"382","state_id":"26","name_ar":"الحسنة","name_en":"Al Hasana"},
        {"id":"383","state_id":"27","name_ar":"سوهاج","name_en":"Sohag"},
        {"id":"384","state_id":"27","name_ar":"سوهاج الجديدة","name_en":"Sohag El Gedida"},
        {"id":"385","state_id":"27","name_ar":"أخميم","name_en":"Akhmeem"},
        {"id":"386","state_id":"27","name_ar":"أخميم الجديدة","name_en":"Akhmim El Gedida"},
        {"id":"387","state_id":"27","name_ar":"البلينا","name_en":"Albalina"},
        {"id":"388","state_id":"27","name_ar":"المراغة","name_en":"El Maragha"},
        {"id":"389","state_id":"27","name_ar":"المنشأة","name_en":"almunshaa"},
        {"id":"390","state_id":"27","name_ar":"دار السلام","name_en":"Dar AISalaam"},
        {"id":"391","state_id":"27","name_ar":"جرجا","name_en":"Gerga"},
        {"id":"392","state_id":"27","name_ar":"جهينة الغربية","name_en":"Jahina Al Gharbia"},
        {"id":"393","state_id":"27","name_ar":"ساقلته","name_en":"Saqilatuh"},
        {"id":"394","state_id":"27","name_ar":"طما","name_en":"Tama"},
        {"id":"395","state_id":"27","name_ar":"طهطا","name_en":"Tahta"},
        {"id":"396","state_id":"27","name_ar":"الكوثر","name_en":"Alkawthar"} ]';

        foreach (json_decode($entries, true) as $entry) {
            $data = [
                'ar' => ["name" => $entry["name_ar"]],
                'en' => ["name" => $entry["name_en"]],
                'state_id' => $entry["state_id"]
            ];
            City::factory(1)->state(new Sequence($data))->create();
        }
    }

    private function seedFoundation(){
            $foundationData = [
                'ar' => ["name" => "شركة الكهرباء ","desc" => " عن المؤسسة  عن المؤسسة عن المؤسسة "],
                'map' => "maps.com",
                'website' => "www.example.com",
                'phone' => "+201000000",
                'landline' => "023811111",
                'email' => "example@example.com",
                'creator_id' => 1,
            ];

              Foundation::create($foundationData);

              FoundationImage::create( [
                'ar' => ["image" => "image1.png"],
                   'foundation_id' => 1,
                   'creator_id' => 1,

               ]);

              FoundationImage::create( [
                'ar' => ["image" => "image2.png"],
                   'foundation_id' => 1,
                   'creator_id' => 1,
               ]);

             FoundationSound::create(
                    [ 'ar' => ["sound" => "sound1.mp3"],
                      'foundation_id' => 1,
                      'creator_id' => 1,
                     ]);

            FoundationSound::create(
            [ 'ar' => ["sound" => "sound2.mp3"],
                'foundation_id' => 1,
                'creator_id' => 1,
                ]);

              FoundationVideo::create(
            [ 'ar' => ["video" => "video1.mp3"],
              'foundation_id' => 1,
              'creator_id' => 1,
             ]);

              FoundationVideo::create(
            [ 'ar' => ["video" => "video2.mp3"],
              'foundation_id' => 1,
              'creator_id' => 1,
             ]);

    }
    private function seedAbout(){
            $aboutData = [
                'ar' => ["desc" => " عن البرنامج  عن البرنامج عن البرنامج "],
                'creator_id' =>1,
            ];

          $about =  About::create($aboutData);


              AboutSound::create(
                [ 'ar' => ["sound" => "sound1.mp3"],
                'about_id' => $about->id,
                'creator_id' =>1,
               ]
              );
              AboutSound::create(
                [ 'ar' => ["sound" => "sound2.mp3"],
                'about_id' => $about->id,
                'creator_id' =>1,
               ]
              );

              AboutVideo::create(
                [ 'ar' => ["video" => "video1.mp3"],
                'about_id' => $about->id,
                'creator_id' =>1,
               ]
              );
              AboutVideo::create(
                [ 'ar' => ["video" => "video2.mp3"],
                'about_id' => $about->id,
                'creator_id' =>1,
               ]
              );

    }

    private function seedBranch(){
            $branchData = [
                'ar' => ["desc" => " عن الفرع  عن الفرع عن الفرع ","name" => "اسم الفرع", "note" => "ملاحظات ملاحظات ملاحظات ", "address" => "عنوان الفرع"],
                'map' =>'map.com',
                'email' =>'example@example.com',
                'phone1' =>'+2015152514',
                'phone2' =>'+2015545454',
                'landline1' =>'021545454',
                'landline2' =>'025545454',
                'pwd_status' =>1,
                'creator_id' =>1,
                'foundation_id' =>1,
                'city_id' =>5,
            ];

          $branch =  Branch::create($branchData);


             BranchSound::create(
                [ 'ar' => ["sound" => "sound1.mp3"],
                'branch_id' => $branch->id,
                'creator_id' =>1,
               ]
              );
              BranchSound::create(
                [ 'ar' => ["sound" => "sound2.mp3"],
                'branch_id' => $branch->id,
                'creator_id' =>1,
               ]
              );

             BranchImage::create(
                [ 'ar' => ["image" => "image1.png"],
                'branch_id' => $branch->id,
                'creator_id' =>1,
               ]
              );
              BranchImage::create(
                [ 'ar' => ["image" => "image2.png"],
                'branch_id' => $branch->id,
                'creator_id' =>1,
               ]
              );

              BranchVideo::create(
                [ 'ar' => ["video" => "video1.mp3"],
                'branch_id' => $branch->id,
                'creator_id' =>1,
               ]
              );
              BranchVideo::create(
                [ 'ar' => ["video" => "video2.mp3"],
                'branch_id' => $branch->id,
                'creator_id' =>1,
               ]
              );

    }

    private function seedService(){

            $serviceData = [
                'ar' => ["desc" => " عن الخدمة  عن الخدمة عن الخدمة ","title" => "اسم الخدمة"],
                'creator_id' =>1,
            ];

          $service =  Service::create($serviceData);


             ServiceImage::create([
                'image' =>  "image1.png",
                'service_id' => $service->id,
                'creator_id' =>1,
               ]
              );
              ServiceImage::create([
                'image' =>  "image2.png",
                'service_id' => $service->id,
                'creator_id' =>1,
               ]
              );

               ServiceTranslationMedia::create([
                   'title_sound' => 'title_sound1.mp3',
                   'title_video' => 'title_video1.mp4',
                   'desc_sound' => 'desc_sound1.mp3',
                   'desc_video' => 'desc_video1.mp4',
                   'service_translation_id' => $service->translate('ar')->id,
               ]);

         $this->seedDocument($service->id);
         $this->seedProcedure($service->id);
         $this->seedRegulation($service->id);
         $this->seedFaq($service->id);
         $this->seedSubService($service->id);
    }

    private function seedSubService($id){

            $serviceData = [
                'ar' => ["desc" => " عن الخدمة الداخلية عن الخدمة الداخلية عن الخدمة ","title" => " اسم الخدمة الداخلية"],
                'creator_id' =>1,
                'parent_id' =>$id,
            ];

          $service =  Service::create($serviceData);


             ServiceImage::create([
                'image' =>  "image1.png",
                'service_id' => $service->id,
                'creator_id' =>1,
               ]
              );
              ServiceImage::create([
                'image' =>  "image2.png",
                'service_id' => $service->id,
                'creator_id' =>1,
               ]
              );

               ServiceTranslationMedia::create([
                   'title_sound' => 'title_sound1.mp3',
                   'title_video' => 'title_video1.mp4',
                   'desc_sound' => 'desc_sound1.mp3',
                   'desc_video' => 'desc_video1.mp4',
                   'service_translation_id' => $service->translate('ar')->id,
               ]);

         $this->seedDocument($service->id);
         $this->seedProcedure($service->id);
         $this->seedRegulation($service->id);
         $this->seedFaq($service->id);
    }

    private function seedDocument($id){

        $documentData1 = [
            'ar' => ["desc" => "1 عن المستند  عن المستند عن المستند ","title" => "اسم المستند1"],
            'creator_id' =>1,
            'order' =>1,
            'service_id' =>$id,
        ];
        $document1 =  Document::create($documentData1);

        DocumentImage::create([
            'image' =>  "image1.png",
            'document_id' => $document1->id,
            'creator_id' =>1,
           ]
          );
          DocumentImage::create([
            'image' =>  "image2.png",
            'document_id' => $document1->id,
            'creator_id' =>1,
           ]
          );

          DocumentTranslationMedia::create([
            'title_sound' => 'title_sound1.mp3',
            'title_video' => 'title_video1.mp4',
            'desc_sound' => 'desc_sound1.mp3',
            'desc_video' => 'desc_video1.mp4',
            'document_translation_id' => $document1->translate('ar')->id,
        ]);

        $documentData2 = [
            'ar' => ["desc" => "2 عن المستند  عن المستند عن المستند ","title" => "اسم المستند2"],
            'creator_id' =>1,
            'order' =>2,
            'service_id' =>$id,
        ];
        $document2 =  Document::create($documentData2);

        DocumentImage::create([
            'image' =>  "image1.png",
            'document_id' => $document2->id,
            'creator_id' =>1,
           ]
          );
          DocumentImage::create([
            'image' =>  "image2.png",
            'document_id' => $document2->id,
            'creator_id' =>1,
           ]
          );

          DocumentTranslationMedia::create([
            'title_sound' => 'title_sound1.mp3',
            'title_video' => 'title_video1.mp4',
            'desc_sound' => 'desc_sound1.mp3',
            'desc_video' => 'desc_video1.mp4',
            'document_translation_id' => $document2->translate('ar')->id,
        ]);

    }

    private function seedProcedure($id){

        $procedureData1 = [
            'ar' => ["desc" => "1 عن الاجراء  عن الاجراء عن الاجراء "],
            'creator_id' =>1,
            'order' =>1,
            'service_id' =>$id,
        ];
        $procedure1 =  Procedure::create($procedureData1);

        ProcedureImage::create([
            'image' =>  "image1.png",
            'procedure_id' => $procedure1->id,
            'creator_id' =>1,
           ]
          );
          ProcedureImage::create([
            'image' =>  "image2.png",
            'procedure_id' => $procedure1->id,
            'creator_id' =>1,
           ]
          );

          ProcedureTranslationMedia::create([
            'desc_sound' => 'desc_sound1.mp3',
            'desc_video' => 'desc_video1.mp4',
            'procedure_translation_id' => $procedure1->translate('ar')->id,
        ]);

        $procedureData2 = [
            'ar' => ["desc" => "2 عن الاجراء  عن الاجراء عن الاجراء "],
            'creator_id' =>1,
            'order' =>2,
            'service_id' =>$id,
        ];
        $procedure2 =  Procedure::create($procedureData2);

        ProcedureImage::create([
            'image' =>  "image1.png",
            'procedure_id' => $procedure2->id,
            'creator_id' =>1,
           ]
          );
          ProcedureImage::create([
            'image' =>  "image2.png",
            'procedure_id' => $procedure2->id,
            'creator_id' =>1,
           ]
          );

          ProcedureTranslationMedia::create([
            'desc_sound' => 'desc_sound1.mp3',
            'desc_video' => 'desc_video1.mp4',
            'procedure_translation_id' => $procedure2->translate('ar')->id,
        ]);

    }

    private function seedRegulation($id){

        $regulationData1 = [
            'ar' => ["desc" => "1 عن القواعد  عن القواعد عن القواعد "],
            'creator_id' =>1,
            'service_id' =>$id,
        ];
        $regulation1 =  Regulation::create($regulationData1);

        RegulationImage::create([
            'image' =>  "image1.png",
            'regulation_id' => $regulation1->id,
            'creator_id' =>1,
           ]
          );
          RegulationImage::create([
            'image' =>  "image2.png",
            'regulation_id' => $regulation1->id,
            'creator_id' =>1,
           ]
          );

          RegulationTranslationMedia::create([
            'desc_sound' => 'desc_sound1.mp3',
            'desc_video' => 'desc_video1.mp4',
            'regulation_translation_id' => $regulation1->translate('ar')->id,
        ]);

        $regulationData2 = [
            'ar' => ["desc" => "2 عن القواعد  عن القواعد عن القواعد "],
            'creator_id' =>1,
            'service_id' =>$id,
        ];
        $regulation2 =  Regulation::create($regulationData2);

        RegulationImage::create([
            'image' =>  "image1.png",
            'regulation_id' => $regulation2->id,
            'creator_id' =>1,
           ]
          );
          RegulationImage::create([
            'image' =>  "image2.png",
            'regulation_id' => $regulation2->id,
            'creator_id' =>1,
           ]
          );

          RegulationTranslationMedia::create([
            'desc_sound' => 'desc_sound1.mp3',
            'desc_video' => 'desc_video1.mp4',
            'regulation_translation_id' => $regulation2->translate('ar')->id,
        ]);

    }
    private function seedFaq($id){

        $faqData1 = [
            'ar' => ["q_and_a" => "السؤال 1 الاجابة 1"],
            'creator_id' =>1,
            'order' =>1,
            'service_id' =>$id,
        ];
        $faq1 =  Faq::create($faqData1);

        FaqImage::create([
            'image' =>  "image1.png",
            'faq_id' => $faq1->id,
            'creator_id' =>1,
           ]
          );
          FaqImage::create([
            'image' =>  "image2.png",
            'faq_id' => $faq1->id,
            'creator_id' =>1,
           ]
          );

          FaqTranslationMedia::create([
            'q_and_a_sound' => 'q_and_a_sound1.mp3',
            'q_and_a_video' => 'q_and_a_video1.mp4',
            'faq_translation_id' => $faq1->translate('ar')->id,
        ]);

        $faqData2 = [
            'ar' => ["q_and_a" => "السؤال 2 الاجابة 2"],
            'creator_id' =>1,
            'order' =>2,
            'service_id' =>$id,
        ];
        $faq2 =  Faq::create($faqData2);

        FaqImage::create([
            'image' =>  "image1.png",
            'faq_id' => $faq2->id,
            'creator_id' =>1,
           ]
          );
          FaqImage::create([
            'image' =>  "image2.png",
            'faq_id' => $faq2->id,
            'creator_id' =>1,
           ]
          );

          FaqTranslationMedia::create([
            'q_and_a_sound' => 'q_and_a_sound1.mp3',
            'q_and_a_video' => 'q_and_a_video1.mp4',
            'faq_translation_id' => $faq2->translate('ar')->id,
        ]);

    }

    public function spatie(){

        //spatie seeder

         $superAdmin = User::create([
            'name' => 'Super admin',
            'email' => 'admin@admin.com',
            'type' => 0,
            'password' => Hash::make('123456789')
         ]);

               $superAdminRole = Role::create([
                'name' => 'super-admin',
                'guard_name' => 'web',
            ]);

            Permission::insert([

                [
                    'name' => 'Home page',
                    'guard_name' => 'web',
                ],
                 [
                    'name' => 'deafs',
                    'guard_name' => 'web',
                ],
                 [
                    'name' => 'employees',
                    'guard_name' => 'web',
                ],
                 [
                    'name' => 'foundations',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'roles',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'admins',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'abouts',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'branches',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'services',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'documents',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'faqs',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'procedures',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'regulations',
                    'guard_name' => 'web',
                ],
                [
                    'name' => 'excel',
                    'guard_name' => 'web',
                ],
                       ]);

            foreach (Permission::all() as $permission) {
            $superAdminRole->permissions()->attach($permission);
        }

        $superAdmin->assignRole('super-admin');
    }
}
