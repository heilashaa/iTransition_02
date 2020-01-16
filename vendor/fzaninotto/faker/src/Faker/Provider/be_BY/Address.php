<?php

namespace Faker\Provider\be_BY;

class Address extends \Faker\Provider\Address
{
    protected static $cityPrefix = array('гор.');

    protected static $regionSuffix = array('вобласць');
    protected static $streetPrefix = array(
        'вул.', 'пр.', 'шаша', 'пл.',
    );

    protected static $buildingNumber = array('##');
    protected static $postcode = array('######');
    
    /**
     * @link https://ru.wikipedia.org/wiki/Общероссийский_классификатор_стран_мира#Список_стран_согласно_Классификатору
     */
    protected static $country = array(
        'Абхазия',
    );

    protected static $region = array(
        'Брэсцкая', 'Віцебская', 'Гомельская', 'Гродзенская', 'Мінская',
        'Магілёўская',
    );

    protected static $city = array(
        'Бабруйск', 'Барысаў', 'Віцебск', 'Гомель', 'Мінск',
        'Магілёў', 'Мазыр', 'Орша', 'Полацк', 'Рэчыца',
        'Слуцк', 'Быхаў', 'Ветка', 'Горкі', 'Гарадок',
        'Дзяржынск', 'Добруш', 'Дуброўна', 'Жлобін', 'Баранавічы',
        'Калінкавічы', 'Клімавічы', 'Касцюковічы', 'Крычаў', 'Лепель',
        'Мсціслаў', 'Асіповічы', 'Петрыкаў', 'Рагачоў', 'Сянно',
        'Старыя Дарогі', 'Чавусы', 'Чэрвень', 'Чэрыкаў', 'Шклоў',
    );

    protected static $street = array(
        'Леніна', '8 Сакавіка', '50 гадоў Перамогі', 'Ангарская', 'Аўтазаводская', 'Азізава', 'Асаналіева', 'Базісная', 'Брэсцкая',
        'Ваўпшасава', 'Вясенняя', 'Гастэлы', 'газеты "Праўда"', 'Еўфрасінні Полацкай', 'Чыгуначная',
        'Калініна', 'Казінца', 'Маякоўскага', 'Мяснікова', 'Чырвонаармейская'
    );

    protected static $addressFormats = array(
        "{{postcode}}, {{region}} {{regionSuffix}}, {{cityPrefix}} {{city}}, {{streetPrefix}} {{street}}, {{buildingNumber}}",
    );

    protected static $streetAddressFormats = array(
        "{{streetPrefix}} {{street}}, {{buildingNumber}}"
    );

    public static function buildingNumber()
    {
        return static::numerify(static::randomElement(static::$buildingNumber));
    }

    public function address()
    {
        $format = static::randomElement(static::$addressFormats);

        return $this->generator->parse($format);
    }

    public static function country()
    {
        return static::randomElement(static::$country);
    }

    public static function postcode()
    {
        return static::toUpper(static::bothify(static::randomElement(static::$postcode)));
    }

    public static function regionSuffix()
    {
        return static::randomElement(static::$regionSuffix);
    }

    public static function region()
    {
        return static::randomElement(static::$region);
    }

    public static function cityPrefix()
    {
        return static::randomElement(static::$cityPrefix);
    }

    public function city()
    {
        return static::randomElement(static::$city);
    }

    public static function streetPrefix()
    {
        return static::randomElement(static::$streetPrefix);
    }

    public static function street()
    {
        return static::randomElement(static::$street);
    }
}
