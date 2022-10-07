<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class News
{

/*
    private array $newsList = [
        [
            'id' => 1,
            'title' => 'В Финляндии вступил в силу запрет на въезд для российских туристов',
            'text' => 'Решение кабинета министров Финляндии о закрытии границы для российских туристов в пятницу вступило в силу. В загранпаспорте туриста, которому откажут во въезде, будет сделана соответствующая пометка, а сама виза фактически аннулируется.',
            'category_id' => 1
        ],
        [
            'id' => 2,
            'title' => 'NYT: США планируют создать в Германии центр для координации военной помощи Украине',
            'text' => 'США готовятся создать на территории Германии командный центр, который займется координацией усилий западных стран по оказанию военной помощи Украине. Об этом сообщила в четверг газета The New York Times со ссылкой на источники в Пентагоне и администрации США.',
            'category_id' => 1
        ],
        [
            'id' => 3,
            'title' => 'WSJ: на "Северных потоках" было два взрыва общей мощностью почти в 1 тыс. кг тротила',
            'text' => 'Датские чиновники пришли к выводу, что на нитках газопроводов "Северный поток" и "Северный поток - 2" в понедельник произошло два взрыва общей мощностью более 1 тыс. кг в тротиловом эквиваленте. Об этом в четверг сообщила газета The Wall Street Journal со ссылкой на осведомленные источники.',
            'category_id' => 1
        ],
        [
            'id' => 4,
            'title' => 'Из бюджета РФ выделят 3,3 млрд рублей на поддержку ДНР, ЛНР, Запорожской и Херсонской областей',
            'text' => 'Из бюджета России будет выделено 3,3 млрд рублей на поддержку Донецкой и Луганской республик, а также Запорожской и Херсонской областей после их присоединения к РФ. Об этом сообщил первый замглавы администрации президента Сергей Кириенко, передает ТАСС',
            'category_id' => 1
        ],
        [
            'id' => 5,
            'title' => 'Юрлица смогут покупать акции компаний из «недружественных» стран без ограничений',
            'text' => 'Центробанк (ЦБ) смягчил правила торговли иностранными ценными бумагами из «недружественных» стран. Теперь юридические лица смогут покупать ценные бумаги «недружественных» эмитентов вне зависимости от наличия статуса квалифицированного инвестора.',
            'category_id' => 2
        ],
        [
            'id' => 6,
            'title' => 'Оператор «Турецкого потока» сообщил об отзыве лицензии из-за санкций ЕС',
            'text' => 'Компания South Stream Transport B. V., оператор газопровода «Турецкий поток», сообщила, что у нее досрочно отозвали экспортную лицензию из-за санкций Европейского союза (ЕС) против России. Лицензия была отозвана 18 сентября. Пресс-релиз компании имеется в распоряжении «Ъ».',
            'category_id' => 2
        ],
        [
            'id' => 7,
            'title' => 'Турецкий Ziraat bank подтвердил приостановку использования карт «Мир»',
            'text' => 'Турецкий государственный Ziraat Bank вышел из российской платежной системы «Мир» и больше не обслуживает ее карты. Об этом сообщает Reuters со ссылкой на генерального директора банка Альпаслана Чакара. Ранее информация о том, что госбанки Турции вслед за частными отказались от «Мира», появилась в СМИ, однако официальных подтверждений не было.',
            'category_id' => 2
        ],
        [
            'id' => 8,
            'title' => 'Польша ввела санкции против "Газпром экспорт"',
            'text' => 'Польша ввела санкции в отношении компании "Газпром экспорт", включая замораживание всех активов, сообщает министерство внутренних дел и администрации республики. МВД Польши в четверг обновило список подсанкционных компаний и физических лиц. В него включено "ООО "Газпром экспорт" со штаб-квартирой в Санкт-Петербурге, Российская Федерация". Поясняется, что санкции включают в себя "замораживание всех финансовых и экономических ресурсов, запрет на предоставление каких-либо финансовых или экономических ресурсов".',
            'category_id' => 2
        ],
        [
            'id' => 9,
            'title' => 'В финале женского чемпионата мира по баскетболу сыграют сборные США и Китая',
            'text' => 'Завтра, 1 октября, состоится финальный матч женского чемпионата мира по баскетболу, в котором сразятся национальные команды США и Китая. Стартовый свисток прозвучит в 9:00 мск.',
            'category_id' => 3
        ],
        [
            'id' => 10,
            'title' => 'ИИХФ определила принципы возвращения России на международную арену',
            'text' => 'Сегодня состоялся полугодовой Конгресс Международной федерации хоккея (ИИХФ), на котором стали известны принципы возвращения сборных России и Беларуси к международным соревнованиям.',
            'category_id' => 3
        ],
        [
            'id' => 11,
            'title' => 'FIS оставит отстранение российских лыжников в силе',
            'text' => 'Президент Федерации лыжных гонок России, главный тренер национальной команды Елена Вяльбе заявила, что после введения частичной мобилизации в России вопрос возвращения российских спортсменов на международную арену практически снят с повестки Международной федерации лыжного спорта и сноуборда (FIS).',
            'category_id' => 3
        ],
        [
            'id' => 12,
            'title' => 'Никто из российских биатлонистов не хочет сменить гражданство',
            'text' => 'Ни один из российских биатлонистов не выразил желание сменить гражданство, заявил на форуме "Россия - спортивная держава" президент Союза биатлонистов России (СБР) Виктор Майгуров.',
            'category_id' => 3
        ],
        [
            'id' => 13,
            'title' => 'Уникальную операцию на сердце провели в госпитале им. Вишневского',
            'text' => 'В госпитале им. Вишневского Минобороны России провели трансплантацию искусственного левого желудочка сердца, сообщает телеканал "Звезда".',
            'category_id' => 4
        ],
        [
            'id' => 14,
            'title' => 'В ближайшие годы в России появится 11 новых биотехнологических препаратов',
            'text' => 'Группа компаний «Рус Биофарм» поделилась амбициозными планами на ближайшее будущее и провела экскурсию по своей производственной площадке в Дубне на биофармацевтическом заводе «ПСК Фарма». Мероприятие прошло в рамках празднования 10-летнего юбилея группы компаний. В. Бобров, президент торгово-промышленной палаты Дубны, отметил деятельность компании и вручил руководителям ГК «Рус Биофарм» награду за успехи в развитии бизнеса.',
            'category_id' => 4
        ],
        [
            'id' => 15,
            'title' => 'В Ленинградской области открылся новый корпус фармзавода «Северная звезда»',
            'text' => 'В Ленинградской области открыли второй корпус завода фармацевтической компании «Северная звезда». Производственный корпус в Низино Ломоносовского района Ленинградской области площадью 7200 м2 предназначен для выпуска готовых лекарственных средств — инъекционных растворов, глазных капель и спреев в годовом объеме 140 млн упаковок ампул, 13 млн упаковок глазных капель, 10 млн упаковок спреев. Инвестиции в запуск второго корпуса составили 4 млрд рублей. Запуск новой производственной площадки имеет большое социальное значение, т.к. появилось 200 новых рабочих мест.',
            'category_id' => 4
        ],
        [
            'id' => 16,
            'title' => 'Корабль "Союз" с тремя космонавтами начал снижение',
            'text' => 'Корабль "Союз МС-21", на котором с Международной космической станции возвращаются россияне Олег Артемьев, Денис Матвеев и Сергей Корсаков, начал сходить с орбиты, передает корреспондент РИА Новости из Центра управления полетами (ЦУП), где идет трансляция посадки.',
            'category_id' => 5
        ],
        [
            'id' => 17,
            'title' => 'Новое экологичное топливо из мусора научились делать в России',
            'text' => 'Метод производства экологически чистого топлива из органических отходов различных типов предложили ученые ТюмГУ. По их словам, получаемые составы не уступают традиционным углям и могут применяться в качестве удобрения. Об этом сообщили в пресс-службе вуза.',
            'category_id' => 5
        ],
        [
            'id' => 18,
            'title' => 'Китайские ученые опубликовали новые результаты миссии "Тяньвэнь-1" на Марсе',
            'text' => 'Ученые КНР опубликовали в журнале Nature результаты новых исследований, проведённых в рамках миссии "Тяньвэнь-1". Китайский зонд, исследовавший поверхность Марса с прошлого года, помог установить ранее неизвестные факты. С помощью полученных в рамках миссии "Тяньвэнь-1" данных ученые изучили строение слоёв грунта равнины Утопия на глубине до 80-ти метров, и выяснили, что 3 миллиарда лет назад там могло быть наводнение.',
            'category_id' => 5
        ]
    ]; */

    public function getNews()
    {
        return json_decode(Storage::disk('local')->get('news.json'), true);
    }

    public function getNewsOnCategory($categoryId): array
    {
        $newsOfCategory =[];
        foreach ($this->getNews() as $news) {
            if ($news['category_id'] == $categoryId) {
                $newsOfCategory[] = $news;
            }
        }
        return $newsOfCategory;
    }

    public function getOneNews($id)
    {
        foreach ($this->getNews() as $news) {
            if ($news['id'] == $id) {
                return $news;
            }
        }
        return null;
    }
}
