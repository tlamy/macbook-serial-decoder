<?php

declare(strict_types=0);

namespace Tlamy\MacbookSerialDecoder;

use DateTime;
use LogicException;

class MacSerialService
{
    private TypeRepository $typeRepository;

    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    public function lookup(string $serial): MacSerialInfo
    {
        $serial = strtoupper($serial);
        $serial = trim(preg_replace('/\s+/', '', $serial));
        $serial_length = strlen($serial);

        if ($serial_length === 11) {
            // echo "Computer Pre-2012<br/>";
            $location = substr($serial, 0, 2);

            if (($factoryLocation = $this->typeRepository->findFactory($location)) === null) {
                $location = substr($location, 0, -1);
                $factoryLocation = $this->typeRepository->findFactory($location) ?? 'Unknown';
            }
            // echo "Factory: $factoryLocation\n";
            $year = substr($serial, 2, 1);
            $week = substr($serial, 3, 2);  // week of manufacture
            $serial_last4 = substr($serial, 8, 3);
            $build_year = $this->typeRepository->findYear11($year);
            $build_week = $week;
        } elseif ($serial_length === 12) {
            // echo "Computer Post-2012\n";
            $location = substr($serial, 0, 3);

            if (($factoryLocation = $this->typeRepository->findFactory($location)) === null) {
                $location = substr($location, 0, -1);
                $factoryLocation = $this->typeRepository->findFactory($location) ?? 'Unknown';
            }

            $year = substr($serial, 3, 1);
            $week = substr($serial, 4, 1);
            $serial_last4 = substr($serial, 8, 4);
            $build_year = $this->typeRepository->findYear12($year);
            $build_week = $this->typeRepository->findWeek($week);
        } else {
            throw new LogicException('Unknown serial format');
        }

        if ($build_week !== '53' && str_ends_with($build_year, '-2')) {
            $build_week = (int)$build_week + 26;
        }

        $build_date = (new DateTime())->setISODate(substr($build_year, 0, 4), $build_week)
            ->format('Y-m-d');

        $model = $this->typeRepository->findModel($serial_last4);

        return new MacSerialInfo($model, $build_date, $factoryLocation);
    }

}
