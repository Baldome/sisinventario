<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Location;
use App\Models\State;
use App\Models\Tool;
use App\Models\Unit;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ToolsImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'tools' => new ToolsSheetImport(),
        ];
    }
}

class ToolsSheetImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{

    private $categories, $states, $locations, $users, $units;

    public function __construct()
    {
        $this->categories = Category::all()->pluck('id', 'name')->toArray();
        $this->states = State::all()->pluck('id', 'name')->toArray();
        $this->locations = Location::all()->pluck('id', 'name')->toArray();
        $this->users = User::all()->pluck('id', 'name')->toArray();
        $this->units = Unit::all()->pluck('id', 'name')->toArray();
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Tool([
            'code' => $row['code'] ?? null,
            'name' => $row['name'] ?? null,
            'state_id' => $this->states[$row['state_id'] ?? null],
            'category_id' => $this->categories[$row['category_id'] ?? null],
            'location_id' => $this->locations[$row['location_id'] ?? null],
            'admission_date' => $this->transformDate($row['admission_date'] ?? null),
            'user_id' => $this->users[$row['user_id'] ?? null],
            'unit_id' => $this->units[$row['unit_id'] ?? null],
            'image' => $row['image'],
            'amount' => $row['amount'],
            'description' => $row['description'],
            'observations' => $row['observations'],
        ]);
    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        // Si el valor es un número, lo convertimos a una fecha
        if (is_numeric($value)) {
            return Date::excelToDateTimeObject($value)->format($format);
        }
        // Si no es un número, asumimos que ya es una fecha en un formato válido
        return \Carbon\Carbon::parse($value)->format($format);
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
