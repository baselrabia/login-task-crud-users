<?php

namespace App\Imports;

use App\ClientDeal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $idPos   =  strpos($row["client"],"@");
        $clientId = substr($row["client"],$idPos+1);
        $clientName= substr($row["client"],0,$idPos);

        $idPos2   =  strpos($row["deal"],"#");
        $dealId = substr($row["deal"],$idPos2+1);
        $dealName= substr($row["deal"],0,$idPos2);

        
        return new ClientDeal([
            'client_id'     => $clientId,
            'client'        => $clientName,
            'deal_id'       => $dealId ,
            'deal'          => $dealName,
            'hour'          => $row['hour'],
            'accepted'      => $row['accepted'],
            'refused'       => $row['refused'],
        ]);
    }
}
