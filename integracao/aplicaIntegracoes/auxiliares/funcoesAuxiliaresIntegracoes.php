<?php
function createFormOptions($request, $optionsDefault, $optionsForms , $forms){
    array_unshift($forms, 'geral');

    $textForms = '';
    foreach($forms as $form){

        $textOptions = '';

        if($form == 'geral'){

            $textOptions = getValuesOptions($form, $optionsDefault, $request);

        }else{

            $textOptions = getValuesOptions($form, $optionsForms, $optionsForms);

        }


        $textForms .= <<<EOD
     '$form' => [
            $textOptions
        ],
    
EOD;

    }

    return $textForms;
}

function getValuesOptions($form, $options, $request)
{

    $textOptions = '';
    foreach ($options as $option) {

        $optionValue = $_REQUEST[$form . '-' . $option];

        if ($option == 'status' || $option == 'debug' ) {
            $optionValue = $_REQUEST[$form . '-' . $option] ? 'true' : 'false';
            $textOptions .= <<<EOD
'$option' => $optionValue,
            
EOD;
        }elseif($option == 'sendTo') {

        }else {
            $textOptions .= <<<EOD
'$option' => '$optionValue',
            
EOD;
        }

    }// End Foreach


    if (in_array('sendTo', $options)) {
        $emails = [];
        for ($i = 0; $i < 200; $i++) {
            if($_REQUEST[$form . '-sendTo-' . $i] != ''){
                $emails[] .= $_REQUEST[$form . '-sendTo-' . $i];
            }
        }

        $emaill = '';
        foreach ($emails as $index => $email) {
$index++;

        $emaill .= <<<EOD
    '$email',
            
EOD;
        }
        $textOptions .= <<<EOD
'sendTo' => [
            $emaill
            ],
EOD;



    }

        return $textOptions;

}
