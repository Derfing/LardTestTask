<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class ContractorData extends Data
{
    public string $name;
    public string $inn;
    public string $email;
    public function __construct(array $data
    ) {
        $this->name = $data['name'];
        $this->inn = $data['inn'];
        $this->email = $data['email'];
    }
}
