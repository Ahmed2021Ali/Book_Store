<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSedder extends Seeder
{

    public function run(): void
    {
        $books = [
            /* 3 */
            [
                'title' => 'نظرية الفستق',
                'description' => 'المؤلف كتاب نظرية الفستق والمؤلف لـ 12 كتب أخرى.
فهد عامر الأحمدي الحربي (28 سبتمبر 1967)، هو كاتب سعودي صاحب عامود حول العالم في جريدة الرياض. بدأ كتابة المقالة في جريدة المدينة، وفي 17 أغسطس 1991م نشر أول مقال له بعنوان "انف.جار سيبيريا" قبل أن ينتقل إلي جريدة الرياض وينشر أول مقال له في 21 سبتمبر 2000م, ولا يزال كاتباً يومياً في جريدة الرياض. ويعد الكاتب الأعلى أجرًا على مستوى الكتاب السعوديين حاليًا.

حياته:
ولد في المدينة المنورة في حي العطن الشعبي المناهز للمنطقة المركزية المحيطة بالمسجد النبوي الشريف. نشأ في منزل جدته لأمه والتي تنتمي لأسرة الصقعبي من سبيع في البدائع، مما دفع من حوله مبكرا إلى مناداته "فهد الصقعبي" إثر التصاقه بجدته وولعه بها. زوجته طبيبة أطفال وله من الأبناء 3 أولاد وبنتان.

كان مولعاً بالقراءة منذ بداياته، وكان لا يفارق الكتب حتى أنه كان يضع كتاباً ثقافياً في بطن الكتاب المدرسي ليتظاهر أمام أهله بالمذاكرة. التحق بعدة جامعات في تخصصات مختلفة. ولكنه لم يحصل على البكالوريوس. وكان يقضي وقتاً طويلاً في مكتبة الجامعة.

وقد ذكر بأنه مُصاب بمرض البيلومينيا (هوس الكتب)، وهو مرض لا يتمنى أن يُشفى منه على حد قوله، بل ويتمنى أن يُصاب المجتمع بنفس المرض.

تعليمه:
درس المرحلة الابتدائية في مدرسة الشهداء في المدينة المنورة, ثم المرحلة المتوسطة في مدرسة ابن خلدون بالمدينة المنورة ثم المرحلة الثانوية، ودرس في جامعة الملك عبد العزيز بجدة، تخصص (جيولوجيا) ثم تحوّل إلى (الحاسب الآلي)، ثم ترك الجامعة دون الحصول على شهادة البكالوريوس.

ثم أنتقل للدراسة في جامعة هاملاين في مينيسوتا الأمريكية، ولكنه لم يكمل دراسته وعاد.، وقد اعتبر الثمان سنوات التي قضاها في الدراسة في الجامعات مضيعة لوقته.

كما أنه أكد تحدثه بـ 10 لغات منها : الإنجليزية بشكل أساسي، و9 لغات أخرى يتذكر أجزاءً لا بأس منها أثناء تعلمها، مُعتبرًا أن احتكاكه بزوار الحرم المدني الشريف هو السبب الذي أكسبه اللغات التي يتحدث بها.

مقالاته وكتبه:
كتب أكثر من 6000 مقال، وأصدر في عام 1418هـ – 1997م كتاباً بعنوان الزاوية يتضمن 100 مقال من مقالته، كما صدر له كتاب "حول العالم 1" من دار طويق للنشر، وينوي إصدار أجزاء جديدة مستقبلاً. حيث يحتوي كل كتاب من كتبه "حول العالم" 78 مواضيع مُختلفة، وكل موضوع يحتوي على 7 مقالات تخص الموضوع الأساسي. كما له كتاب بعنوان "نظرية الفستق" يحاول الكاتب من خلاله توضيح الأساليب الإيجابية في التفكير والحكم على الأشياء، من خلال استعراض مجموعة من المواقف والقصص الملهمة',
                'offer' => '50',
                'book_page_number' => '338',
                'code' => '1111',
                'status' => '1',
                'quantity' => '15',
                'image' => '1.webp',
                'author_name' => 'فهد عامر الأحمدي',
                'price' => '300',
                'price_after_offer' => '150',
                'category_id' => '3',
            ], // done

            [
                'title' => 'فاتتنى صلاة ',
                'description' => 'كتاب " فاتتني صلاة " من تأليف الكاتب " اسلام جمال " كتاب موجه خاصة لمن لا يصلون و يتهاونون على الصلاة في هذا الكتاب سوف تجد أحسن الطرق للمواظبة عليها لأننا نعلم بأن الصلاة هي السبيل للسعادة و الطمأنينة..

نبذة عن الكتاب :
في الصغر إعتدنا أن يأمرنا من يكبرنا بالصلاة .. فنمتثل للأمر ثم نذهب لنصلي فنجد أن الصلاة ثقيلة .. فنتركها !! نسمع شيخاً يتحدث عن الصلاة و أهميتها و عقوبة وعقوبة تاركها فنذهب لنصلي فنجد ان الصلاة ثقيلة فنتركها ظننا ان من يأمرنا بها لايشعر بما نشعر به ظننا ان من يحافظ عليها لديه هبة إلهية ليست عندنا انتظرنا تلك الهبة طويلاً ،حتي فاتتنا صلاة بعد الصلاة لاننا لم نحل اصل المشكلة وهو لماذا تبدو الصلاة ثقيلة.

ملخص فاتتني صلاة
يتسائل اسلام جمال لماذا البعض يحافظ على الصلاة بينما يتركها الكثيرين ؟ فقسم لنا الكاتب الكتاب إلى عدة فصول للتعرف على أسرار هؤلاء الذين قلما فاتتهم صلاة .',
                'offer' => '25',
                'book_page_number' => '215',
                'code' => '2222',
                'status' => '1',
                'quantity' => '15',
                'image' => '2.webp',
                'author_name' => 'اسلام جمال',
                'price' => '400',
                'price_after_offer' => '300',
                'category_id' => '3',
            ], // done

            [
                'title' => 'تفسير القرآن العظيم تفسير ابن كثير ',
                'description' => 'المؤلف كتاب تفسير القرآن العظيم تفسير ابن كثير والمؤلف لـ 3 كتب أخرى.
عماد الدين أبو الفداء إسماعيل بن عمر بن كثير بن ضَوْ بن درع القرشي الحَصْلي، البُصروي، الشافعي، ثم الدمشقي، مُحدّث ومفسر وفقيه، ولد بمجدل من أعمال دمشق سنة 701 هـ، ومات أبوه سنة 703 هـ، ثم انتقل إلى دمشق مع أخيه كمال الدين سنة 707 هـ بعد موت أبيه، حفظ القرآن الكريم وختم حفظه في سنة 711 هـ، وقرأ القراءات وجمع التفسير، وحفظ متن «التنبيه» في فقه الشافعي سنة 718 هـ، وحفظ مختصر ابن الحاجب، وتفقه على الشيخين برهان الدين الفزاري، وكمال الدين ابن قاضي شهبة، سمع الحديث من ابن الشحنة، وابن الزراد، وإسحاق الآمدي، وابن عساكر، والمزي، وابن الرضى، شرع في شرح صحيح البخاري ولازم المزي، وقرأ عليه تهذيب الكمال، وصاهره على ابنته، وصاحب ابن تيمية، ولي العديد من المدارس العلمية في ذلك العصر، منها: دار الحديث الأشرفية، والمدرسة الصالحية، والمدرسة النجيبية، والمدرسة التنكزية، والمدرسة النورية الكبرى، توفي في شعبان سنة 774 هـ، وَكَانَ قد أضرّ فِي أَوَاخِر عمره، ودفن بجوار ابن تيمية في مقبرة الصوفية خارج باب النصر من دمشق، له عدة تصنيفات أشهرها: تفسير القرآن العظيم، والبداية والنهاية، وطبقات الشافعية، الباعث الحثيث شرح اختصار علوم الحديث، والسيرة النبوية، وله رسالة في الجهاد، وشرع في كتاب كبير للأحكام ولم يكمله، وله شرح صحيح البخاري وهو مفقود.
',
                'offer' => '50',
                'book_page_number' => '2061',
                'code' => '3333',
                'status' => '1',
                'quantity' => '15',
                'image' => '3.webp',
                'author_name' => 'ابن كثير',
                'price' => '500',
                'price_after_offer' => '250',
                'category_id' => '3',
            ], // done

            [
                'title' => 'الداء والدواء ',
                'description' => 'المؤلف كتاب الداء والدواء والمؤلف لـ 745 كتب أخرى.
أَبُو عَبْدِ الله شَمْسُ الدَّينَ مُحَمَّدُ بْنْ أَبِي بَكرِ بْنْ أَيُّوبَ بْنِ سَعْدِ بْنِ حرَيزْ الزُّرْعِيَّ (691هـ - 751هـ/1292م - 1350م) المعروف باسم "ابْنِ قَيَّمِ الجُوزِيَّةِ" أو "ابْنِ القَيَّمِ". هُوَ فقيه ومحدّث ومفسَر وعالم مسلم مجتهد وواحد من أبرز أئمّة المذهب الحنبلي في النصف الأول من القرن الثامن الهجري. نشأ ابن القيم حنبليّ المذهب؛ فقد كان والده "أبو بكر بن أيوب الزرعي" قيّماً على "المدرسة الجوزية الحنبلية"،(1) وعندما شبَّ واتّصل بشيخه ابن تيميّة حصل تحوّل بحياته العلمية، فأصبح لا يلتزم في آرائه وفتاويه بما جاء في المذهب الحنبلي إلا عن اقتناع وموافقة الدليل من الكتاب والسنة ثم على آراء الصحابة وآثار السلف، ولهذا يعتبره العلماء أحد المجتهدين.

وُلد ابن القيم سنة 691 هـ المُوافِقة لسنة 1292م، فنشأ في مدينة دمشق، واتجه لطلب العلم في سن مبكرة، فأخذ عن عدد كبير من الشيوخ في مختلف العلوم منها التفسير والحديث والفقه والعربية، وقد كان ابن تيمية أحد أبرز شيوخه، حيث التقى به في سنة 712هـ/1313م، فلازمه حتى وفاته في سنة 728هـ/1328م، فأخذ عنه علماً جمّاً واتسع مذهبُه ونصرَه وهذّبَ كتبه، وقد كانت مدة ملازمته له سبعة عشر عاماً تقريباً. وقد تولى ابن قيم الجوزية الإمامة في "المدرسة الجوزية"، والتدريس في "المدرسة الصدرية" في سنة 743هـ.

سُجن ابن القيم مع ابن تيمية في شهر شعبان سنة 726هـ/1326م بسبب إنكاره لشدّ الرحال لزيارة القبور، وأوذي بسبب هذا، فقد ضُرب بالدرة وشُهِّر به على حمار. وأفرج عنه في يوم 20 ذو الحجة سنة 728هـ وكان ذلك بعد وفاة ابن تيمية بمدة. ويذكر المؤرخون أنه قد جرت له مشاكل مع القضاة منها في شهر ربيع الأول سنة 746هـ بسبب فتواه بجواز إجراء السباق بين الخيل بغير مُحَلِّل. وكذلك حصلت له مشاكل مع القضاة بسبب فتواه بمسألة أن الطلاق الثلاث بكلمة واحدة يقع طلقة واحدة. وتوفي في 13 رجب سنة 751هـ وعمره ستون سنة، ودُفن بمقبرة الباب الصغير بدمشق.

سار ابن القيم على نهج شيخه ابن تيمية في العقيدة، كما كان له آراء خاصة في الفقه وأصوله ومصطلح الحديث وغير ذلك من المسائل. واشتهر بمؤلفاته في العقيدة والفقه والتفسير والتزكية والنحو بالإضافة إلى القصائد الشعرية.

كان لابن قيم الجوزية تأثير كبير في عصره، فيشير المؤرخون إلى أخْذ الكثيرين العلمَ على يديه. وكذلك برز أثره إلى جانب شيخه ابن تيمية في أماكن متفرقة من العالم الإسلامي في وقت لاحق، فكانت حركة محمد بن عبد الوهاب التي ظهرت في القرن الثاني عشر الهجري امتداداً لدعوة ابن تيمية، وكان محمد بن عبد الوهاب يعتني اعتناء كاملًا بكتبه وكتب ابن القيم، وكذلك الحال بالنسبة لمحمد رشيد رضا. وفي شبه القارة الهندية برز أثر كتبهما أيضاً في عديد من طلبة العلم ونُشرت كتبهما على أيدي العلماء هناك.',
                'offer' => '10',
                'book_page_number' => '751',
                'code' => '4444',
                'status' => '1',
                'quantity' => '15',
                'image' => '4.webp',
                'author_name' => '',
                'price' => '400',
                'price_after_offer' => '300',
                'category_id' => '3',
            ], // done
            /* 2 */
            [
                'title' => 'تعلم الإنجليزية للمبتدئين ',
                'description' => 'كتاب به عدة مراحل
يبدأ من الصفر و ينتهي بالتعلم لجميع القواعد و تكوين قاموس جيد
أنصحكم إن كنتم مبتدئين بالإعتماد عليه',
                'offer' => '50',
                'book_page_number' => '191',
                'code' => '5555',
                'status' => '1',
                'quantity' => '15',
                'image' => '7.webp',
                'author_name' => 'عمر الحوراني',
                'price' => '600',
                'price_after_offer' => '300',
                'category_id' => '2',
            ], // done

            [
                'title' => '6000 كلمة هامة فى اتقان الانجليزية',
                'description' => 'يجب العمل على حفظ هذة الكلمات الهامة المجمعة من مصادر متنوعة حتى نتقن اللغة الانجليزية ، وارجو عدم الملل او الاحباط ، والاصرار على التعلم بكل اجتهاد ودافعية والله الموفق',
                'offer' => '25',
                'book_page_number' => '110',
                'code' => '1212',
                'status' => '1',
                'quantity' => '15',
                'image' => '8.webp',
                'author_name' => 'ياسين محمد نافع',
                'price' => '100',
                'price_after_offer' => '75',
                'category_id' => '2',
            ],

            /* 1 */
            [
                'title' => 'البداية والنهاية ابن كثير ',
                'description' => 'الحمد لله الأول والآخر، الباطن الظاهر، الذي هو بكل شيء عليم، الأول فليس قبله شيء، الآخر فليس بعده شيء، الظاهر فليس فوقه شيء الباطن، فليس دونه شيء، الازلي القديم الذي لم يزل موجودا بصفات الكمال، ولا يزال دائما مستمرا باقيا سرمديا بلا انقضاء ولا انفصال ولا زوال. يعلم دبيب النملة السوداء، على الصخرة الصماء، في الليلة الظلماء، وعدد الرمال. وهو العلي الكبير المتعال، العلي العظيم الذي خلق كل شيء فقدره تقديرا. ورفع السموات بغير عمد، وزينها بالكواكب الزاهرات، وجعل فيها سراجا وقمرا منيرا وسوى فوقهن سريرا، شرجعا عاليا منيفا متسعا مقبيا مستديرا. وهو العرش العظيم - له قوائم عظام، تحمله الملائكة الكرام، وتحفه الكروبيون عليهم الصلاة والسلام، ولهم زجل بالتقديس والتعظيم. وكذا أرجاء السموات مشحونة بالملائكة، ويفد منهم في كل يوم سبعون ألفا إلى البيت المعمور بالسماء الرابعة لا يعودون إليه، آخر ما عليهم في تهليل وتحميد وتكبير وصلاة وتسليم. ووضع الارض للانام على تيار الماء. وجعل فيها رواسي من فوقها وبارك فيها وقدر فيها أقواتها في أربعة أيام قبل خلق السماء، وأنبت فيها من كل زوجين اثنين، دلالة للالباء من جميع ما يحتاج العباد إليه في شتائهم وصيفهم، ولكل ما يحتاجون إليه ويملكونه من حيوان بهيم. وبدأ خلق الانسان من طين، وجعل نسله من سلالة من ماء مهين، في قرار مكين. فجعله سميعا بصيرا، بعد ان لم يكن شيئا مذكورا. وشرفه بالعلم والتعليم. خلق بيده الكريمة آدم أبا البشر، وصور جثته ونفخ فيه من روحه وأسجد له ملائكته، وخلق منه زوجه حواء أم البشر فآنس بها وحدته، وأسكنهما جنته، واسبغ عليهما نعمته. ثم أهبطهما إلى الارض لما سبق في ذلك من حكمة الحكيم. وبث منهما رجالا كثيرا ونساء، وقسمهم بقدرة العظيم ملوكا ورعاة، وفقراء وأغنياء، وأحرارا وعبيدا، وحرائر وإماء. وأسكنهم أرجاء الارض، طولها والعرض، وجعلهم خلائف فيها يخلف البعض منهم البعض، إلى يوم الحساب والعرض على العليم الحكيم. وسخر لهم الانهار من سائر الاقطار، تشق الاقاليم إلى الامصار، ما بين صغار وكبار، على مقدار الحاجات والاوطار، وأنبع لهم العيون والآبار. وأرسل عليهم السحائب بالامطار، فأنبت لهم سائر صنوف الزرع والثمار. وآتاهم من كل ما سألوه بلسان حالهم وقالهم: (وإن تعدوا نعمة الله لا تحصوها إن الانسان لظلوم كفار): فسبحان الكريم العظيم الحليم * وكان من أعظم نعمه عليهم. وإحسانه إليهم، بعد أن خلقهم ورزقهم ويسر لهم السبيل وأنطقهم، أن أرسل رسله إليهم، وأنزل كتبه عليهم: مبينة حلاله وحرامه، وأخباره وأحكامه، وتفصيل كل شيء في المبدإ والمعاد إلى يوم القيامة. فالسعيد من قابل الاخبار بالتصديق والتسليم، والاوامر بالانقياد والنواهي بالتعظيم. ففاز بالنعيم المقيم، وزحزح عن مقام المكذبين في الجحيم ذات الزقوم والحميم، والعذاب الاليم * أحمده حمدا كثيرا طيبا مباركا فيه يملا أرجاء السموات والارضين، دائما أبد الآبدين، ودهر الداهرين، إلى يوم الدين، في كل ساعة وآن ووقت وحين، كما ينبغي لجلاله العظيم، وسلطانه القديم ووجهه الكريم * وأشهد أن لا إله إلا الله وحده لا شريك له، ولا ولد له ولا والد له، ولا صاحبة له، ولا نظير ولا وزير له ولا مشير له، ولا عديد ولا نديد ولا قسيم.',
                'offer' => '25',
                'book_page_number' => '10254',
                'code' => '9999',
                'status' => '1',
                'quantity' => '15',
                'image' => '5.webp',
                'author_name' => 'ابن كثير',
                'price' => '1000',
                'price_after_offer' => '750',
                'category_id' => '1',
            ],// done

            [
                'title' => 'لغة الجسد',
                'description' => 'لغة الجسد تلك الحركات التي يقوم بها بعض الأفراد مستخدمين أيديهم أو تعبيرات الوجه أو أقدامهم أو نبرات صوتهم أو هز الكتف أو الرأس، ليفهم المخاطَب بشكل أفضل المعلومة التي يريد أن تصل إليه وهناك بعض الأشخاص الحذريين والأكثر حرصًا وأولئك الذين يستطيعون تثبيت ملامح الوجه وأولئك الذين لا يريدون الإفصاح عما بداخلهم فهم المتحفظون ولكن يمكن أيضًا معرفة انطباعاتهم من خلال وسائل أخرى.',
                'offer' => '25',
                'book_page_number' => '78',
                'code' => '1010',
                'status' => '1',
                'quantity' => '15',
                'image' => '5.webp',
                'author_name' => 'بيتر كلينتون',
                'price' => '500',
                'price_after_offer' => '375',
                'category_id' => '1',
            ],// done

/*            [
                'title' => '',
                'description' => '',
                'offer' => '',
                'book_page_number' => '',
                'code' => '',
                'status' => '',
                'quantity' => '',
                'image' => '',
                'author_name' => '',
                'price' => '',
                'price_after_offer' => '',
                'category_id' => '',
            ],

            [
                'title' => '',
                'description' => '',
                'offer' => '',
                'book_page_number' => '',
                'code' => '',
                'status' => '',
                'quantity' => '',
                'image' => '',
                'author_name' => '',
                'price' => '',
                'price_after_offer' => '',
                'category_id' => '',
            ],

            [
                'title' => '',
                'description' => '',
                'offer' => '',
                'book_page_number' => '',
                'code' => '',
                'status' => '',
                'quantity' => '',
                'image' => '',
                'author_name' => '',
                'price' => '',
                'price_after_offer' => '',
                'category_id' => '',
            ],*/
        ];
        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
