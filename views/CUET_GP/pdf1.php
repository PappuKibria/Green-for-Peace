<?php
include_once ('../../vendor/autoload.php');
use App\Profile\Profile;

$obj= new Profile();
 $recordSet=$obj->view();
 //var_dump($allData);
$trs="";
$sl=0;

    foreach($recordSet as $row) {
        $id =  $row->id;
        $name = $row->name;
        $bloodGroup =$row->blood_group;
        $contact = $row->contact;

        $sl++;
        $trs .= "<tr>";
        $trs .= "<td width='100'> $sl</td>";
        $trs .= "<td width='150'> $id </td>";
        $trs .= "<td width='250'> $name </td>";
        $trs .= "<td width='150'> $bloodGroup </td>";
        $trs .= "<td width='250'> $contact </td>";

        $trs .= "</tr>";
    }

$html= <<<BITM
<div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th align='left'>Serial</th>
                    <th align='left' >ID</th>
                    <th align='left' >Name</th>
                    <th align='left' >Blood Group</th>
                    <th align='left' >Contact</th>

              </tr>
                </thead>
                <tbody>

                  $trs

                </tbody>
            </table>


BITM;


// Require composer autoload
require_once ('../../vendor/mpdf/mpdf/mpdf.php');
//Create an instance of the class:

$mpdf = new mPDF();

// Write some HTML code:

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('GP Blood Bank.pdf', 'D');