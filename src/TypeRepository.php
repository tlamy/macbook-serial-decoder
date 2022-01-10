<?php

declare(strict_types=1);

namespace Tlamy\MacbookSerialDecoder;

use IVF7\Database\ConnectionServiceInterface;

class TypeRepository
{
    private ConnectionServiceInterface $connectionService;

    /**
     * TypeRepository constructor.
     */
    public function __construct(ConnectionServiceInterface $connectionService)
    {
        $this->connectionService = $connectionService;
    }

    public function findFactory(string $code): ?string
    {
        // Array Containing Factory Codes
        $factory_code = [
            'E'   => 'Singapore',
            'F'   => 'Fountain Colorado, USA',
            'FC'  => 'Fountain Colorado, USA',
            'XA'  => 'USA (Elk Grove/Sacramento, California)',
            'XB'  => 'USA',
            'QP'  => 'USA',
            'G8'  => 'USA',
            'RN'  => 'Mexico',
            'CK'  => 'Cork, Ireland',
            'VM'  => 'Foxconn, Pardubice, Czech Republic',
            'SG'  => 'Singapore',
            'MB'  => 'Malaysia',
            'PT'  => 'Korea',
            'CY'  => 'Korea',
            'EE'  => 'Taiwan',
            'QT'  => 'Taiwan (Quanta Computer)',
            'UV'  => 'Taiwan',
            'FK'  => 'Foxconn-Zhengzhou, China',
            'F1'  => 'Foxconn-Zhengzhou, China',
            'F2'  => 'Foxconn-Zhengzhou, China',
            'W8'  => 'Shanghai China',
            'DL'  => 'Foxconn-China',
            'DM'  => 'Foxconn-China',
            'DN'  => 'Foxconn, Chengdu, China',
            'YM'  => 'Hon Hai/Foxconn, China',
            '7J'  => 'Hon Hai/Foxconn, China',
            '1C'  => 'China',
            '4H'  => 'China',
            'MQ'  => 'China',
            'WQ'  => 'China',
            'F7'  => 'China',
            'C0'  => 'Tech Com-Quanta Computer Subsidiary, China',
            'C3'  => 'Foxconn, Shenzhen, China',
            'C7'  => 'Foxconn, Changhai, China',
            'RM'  => 'Refurbished/remanufactured',
            'F5K' => 'USA (Flextronics)',
            'CK2' => 'Cork, Ireland',
            'C02' => 'Tech Com-Quanta Computer Subsidiary, China',
            'C07' => 'Tech Com-Quanta Computer Subsidiary, China',
            'YM0' => 'China (Hon Hai/Foxconn)',
            'C17' => 'China',
            'C1M' => 'China',
            'C2V' => 'China',
            'C2Q' => 'China',
        ];

        return $factory_code[$code] ?? null;
    }

    public function findYear12(string $code): ?string
    {
        // Array for 12 digit year
        $years = [
            '0' => '2005-1',
            '1' => '2005-2',
            '2' => '2006-1',
            '3' => '2006-2',
            '4' => '2007-1',
            '5' => '2007-2',
            '7' => '2008-2',
            '8' => '2009-1',
            '9' => '2009-2',
            'C' => '2010-1',
            'D' => '2010-2',
            'F' => '2011-1',
            'G' => '2011-2',
            'H' => '2012-1',
            'J' => '2012-2',
            'K' => '2013-1',
            'L' => '2013-2',
            'M' => '2014-1',
            'N' => '2014-2',
            'P' => '2015-1',
            'Q' => '2015-2',
            'R' => '2016-1',
            'S' => '2016-2',
            'T' => '2017-1',
            'V' => '2017-2',
            'W' => '2018-1',
            'X' => '2018-2',
            'Y' => '2019-1',
            'Z' => '2019-2',
        ];

        return $years[$code] ?? null;
    }

    public function findYear11(string $code): ?string
    {
        //Years for 11 digit serial. Yes, it ignores the year 2000 and before.
        $years11 = [
            '0' => '2010',
            '1' => '2011',
            '2' => '2012',
            '3' => '2003',
            '4' => '2004',
            '5' => '2005',
            '6' => '2006',
            '7' => '2007',
            '8' => '2008',
            '9' => '2009',
        ];

        return $years11[$code] ?? null;
    }

    public function findWeek(string $code): ?string
    {
        //Week is the next digit following year, specifying weeks 1 through 26.
        //Weeks 27 through 52 are designated by the "half" of the year specified above.
        //For 12 digit serials only, 11 doesn't require array and is calculated from serial
        $weeks = [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            'C' => '10',
            'D' => '11',
            'F' => '12',
            'G' => '13',
            'H' => '14',
            'J' => '15',
            'K' => '16',
            'L' => '17',
            'M' => '18',
            'N' => '19',
            'P' => '20',
            'Q' => '21',
            'R' => '22',
            'T' => '23',
            'V' => '24',
            'W' => '25',
            'X' => '26',
            'Y' => '53',
        ];

        return $weeks[$code] ?? null;
    }

    public function findProductionline(string $code): ?string
    {
        $production_line = [
            '0' => '0',
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            'A' => '10',
            'B' => '11',
            'C' => '12',
            'D' => '13',
            'E' => '14',
            'F' => '15',
            'G' => '16',
            'H' => '17',
            'J' => '18',
            'K' => '19',
            'L' => '20',
            'M' => '21',
            'N' => '22',
            'P' => '23',
            'Q' => '24',
            'R' => '25',
            'S' => '26',
            'T' => '27',
            'U' => '28',
            'V' => '29',
            'W' => '30',
            'X' => '31',
            'Y' => '32',
            'Z' => '33',
        ];

        return $production_line[$code] ?? null;
    }

    public function findMonthDay(string $code): ?string
    {
        $monthsdays = [
            4 => '10/01',
            1 => '01/05',
            2 => '04/01',
            3 => '06/20',
        ];

        return $monthsdays[$code] ?? null;
    }

    /**
     * @param string $serial_last4
     * @return string|null
     */
    public function findModel(string $serial_last4): ?string
    {
        static $json = null;
        if ($json === null) {
            // load and scan json file for model info
            $file = __DIR__ . '/database.json';
            $json = file_get_contents($file);
        }

        // use this for nested json file
        foreach (json_decode($json, true) as $value) {
            if ($value['last4'] === $serial_last4) {
                //$device_name = $value['name'];
                //$identifier = $value['id'];
                //$modelnum = $value['modelnum'];
                //$message = "Product Found in Database";
                return $value['name'];
            }
        }
        return null;
    }
}
