<?php

namespace App\Http\Controllers\Api\Functions;

use App\Http\Controllers\Api\Functions\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;
class NewController extends BaseController
{


    public function __construct(Request $request) {
        $this->request = $request;
    }


    /*
        =============================================================
        =================== start  getstudentinfo ===================
        ============================================================= 
    */

    public function getstudentinfo(Request $request){

        /*
            ******************* Start Validate Request *******************

            [ 1 ] if sno is exists in request and numer type and it is exists in students_payments table
        */

        // amke the validate and stor the result in validator varibal
        $validator = Validator::make($request->all(), [
            'sno' => 'required|numeric|exists:mysql2.students_payments',
        ],[
            'sno.required' => 'student number is not found',
            'sno.numeric' => 'student number is not a number type',
            'sno.exists' => 'student number is not exists in our data',
        ]);

        // If there is a problem with the validation, return the error message, or else continue with the algorithm
        if($validator->fails()) {
            return $this->sendError('error falidator', $validator->errors());
        }else{

            /*
               ******************* Get the required value from the student *******************
               [ 1 ] Declare a variable to store the data coming to us and then fetch all student data through it
               [ 2 ] If the student hase status equal zero and he deserves the installment, go to the installment and bring the value that has no date and make sure that it is equal to the payment identifier
               [ 3 ] If the student is not entitled to installments, bring the values ​​he must pay from the student's payable schedule
               [ 4 ] Add the values ​​into a single value called the whole amount
            */

            // stor student number to this variable
            $sno = $request['sno'];

            // Declare global variable
            $registration_id = array();
            $amount = 0;
            $status = array();
            $i = 1;

            // get all the student data that have zero status value
            $student = DB::connection('mysql2')->table('students_payments')->where('sno', $sno)->orderBy('sno','DESC')->get();
            // get all the students_payments_details_id data from students payments
            $students_payments_details_id  = DB::connection('mysql2')->table('students_payments')->where('sno', $sno)->first()->students_payments_details_id;
            // get all the registration_id data from students payments details
            $registration_id = DB::connection('mysql2')->table('students_payments_details')->where('id', $students_payments_details_id)->first()->registration_id;
            // get all the installments data 
            $installments = DB::connection('mysql2')->table('installments')->where('sno', $sno)->where('registration_id',$registration_id)->get();
            foreach($student as $stud_fac){
            // get the fac name from fac table 
            $fac_name = DB::connection('mysql2')->table('facs')->where('id',$stud_fac->fac)->first()->fac_name;
            }

            // get the student payed status registration_id
            foreach ($student as $key => $studentData) {
                // get the student is his status is zero
                if ($studentData->status == 0) {
                    switch (true) {
                        // in case his fees type id = 1 get his amount from installment
                        case $studentData->fees_type_id == 1:
                            if($studentData->installment == 1){
                                foreach($installments as $key => $inst){
                                    if($inst->status == 0){
                                        $amount = $amount + $inst->amount;
                                    }
                                }
                            }else{
                                $amount = $studentData->amount;
                            }
                            break;
                        //  in case his fees type id dont = 1 get his amount from students payments
                        case $studentData->fees_type_id != 1:
                            // get all the fees types
                            $fees_amount = DB::connection('mysql2')->table('fees_types')->where('id',$studentData->fees_type_id)->first()->amount; 
                            $amount = $amount + $fees_amount;
                            break;
                    }
                }
            }
            // get all status for student and if in all values ther are 0 value then make status = 0 else status = 1
            foreach ($student as $key => $collection) {
                $status[] = array_push($status, $collection->status);
            }
            if(in_array(0,$status)){
                $status = 0;
            }else{
                $status = 1;
            }


            $payed = $student->first();
            switch (true) {
                case $status != 0:
                    // start formating the data to send it to the api
                    $format = [
            
                        'student_no' => $payed->sno,
                        'student_name' => $payed->sname,
                        'faculties' => $fac_name,
                        'class_no' => $payed->level,
                        'student_status' => 'تم سداد الرسوم مسبقا'
            
            
                    ];
                    // end formating
                    break;
                
                default:
                    // start formating the data to send it to the api
                    $format = [
            
                        'student_no' => $payed->sno,
                        'student_name' => $payed->sname,
                        'faculties' => $fac_name,
                        'total' => $amount,
                        'class_no' => $payed->level,
                        'currency' => $payed->currancy,
                        'student_status' => 0,
            
                    ];
                    // end formating
                    break;
            }

            // return the result to the api
            return $this->sendResponse($format, 'The request was successfully completed');
                

        }

        /*
            ******************* End Validate Request *******************
        */    
    }
    
    /*
        ===========================================================
        =================== end  getstudentinfo ===================
        =========================================================== 
    */


    /*
        =====================================================
        =================== start  payapi ===================
        ===================================================== 
    */
    public function payapi(Request $request){

        /*
            ******************* Start Validate Request *******************

            [ 1 ] if sno is exists in request and numer type and it is exists in students_payments table
            [ 2 ] if status is exists in request and numer type and it is max value is 1 and the value is betuen 1 to 9
            [ 3 ] if phone is exists in request and numer type 
            [ 4 ] if uuid is exists in request and string type 
            [ 5 ] if total is exists in request and numer type 
            [ 6 ] if bank_date is exists in request
            [ 7 ] if currency is exists in request and numer type 
            [ 8 ] if class_no is exists in request and numer type 
        */

        $validator = Validator::make($request->all(), [
            'sno' => 'required|numeric|exists:mysql2.students_payments',
            'phone' => 'required|numeric',
            'uuid' => 'required',
            'total' => 'required|numeric',
            'bank_date' => 'required',
            'currency' => 'required|numeric',
            'class_no' => 'required|numeric',
        ],[
            'sno.required' => 'student number is not found',
            'sno.numeric' => 'student number is not numeric',
            'sno.exists' => 'student number is not exists',
            'phone.required' => 'phone number is not found',
            'phone.numeric' => 'phone number is not numeric',
            'uuid.required' => 'uuid is not found',
            'total.required' => 'total is not found',
            'total.numeric' => 'total is not numeric',
            'bank_date.required' => 'bank_date is not found',
            'currency.required' => 'currency is not found',
            'currency.numeric' => 'currency is not numeric',
            'class_no.required' => 'class_no is not found',
            'class_no.numeric' => 'class_no is not numeric',
        ]);

        // If there is a problem with the validation, return the error message, or else continue with the algorithm
        if($validator->fails()) {
            return $this->sendError('error falidator', $validator->errors());
        }else{

            /*
               ******************* Get the required value from the student *******************

            */

            // stor all data to this variable
            $data = $request->all();
            // stor student number to this variable
            $sno = $request['sno'];

            // Declare global variable
            $registration_id = array();
            $amount = array();
            $time = now();
            $qury = null;

            // get all the student data that have zero status value
            $student = DB::connection('mysql2')->table('students_payments')->where('sno', $sno)->orderBy('sno','DESC')->get();
            // get all the students_payments_details_id data from students payments
            $students_payments_details_id  = DB::connection('mysql2')->table('students_payments')->where('sno', $sno)->first()->students_payments_details_id;
            // get all the registration_id data from students payments details
            $registration_id = DB::connection('mysql2')->table('students_payments_details')->where('id', $students_payments_details_id)->first()->registration_id;
            // get all the installments data 
            $installments = DB::connection('mysql2')->table('installments')->where('sno', $sno)->where('registration_id',$registration_id)->where('status',0)->get();
            // get the student payed status registration_id
            foreach ($student as $key => $studentData) {
                if ($studentData->status == 0) {
                    switch (true) {
                        case $studentData->fees_type_id == 1:
    
                            if($studentData->installment == 1){
                                foreach($installments as $key => $inst){
                                    if($inst->colectionDate == null && empty($inst->uuid)){
                                        $amount[] = array_combine(array($studentData->fees_type_id), array($inst->amount));
                                    }
                                }
                            }else{
                                $amount[] = array_combine(array($studentData->fees_type_id), array($studentData->amount));
                            }
    
                            break;
                        case $studentData->fees_type_id != 1:
                                $amount[] = array_combine(array($studentData->fees_type_id) , array($studentData->amount));
                            break;
                    }
                }
            }
            // return $amount;
            if(!empty($amount)){
                // mak Record for al amounts
                $registration_id = DB::connection('mysql2')->table('students_payments_details')->where('registration_id',$registration_id)->first()->registration_id;
                foreach ($amount as $amountdata) {
                    $qury = DB::connection('mysql2')->table('payments')->insert([
                        'sno' => $sno,
                        'phone' => $data['phone'],
                        'uuid' => $data['uuid'],
                        'bank_date' => $data['bank_date'],
                        'branch' => 1,
                        'voucher_no' => 1,
                        'pay_type_id' => key($amountdata),
                        'currancy' => $data['currency'],
                        'collect_date' => $time,
                        'amount' => implode("",array_values($amountdata)),
                        'sdept' => $student->first()->sdept,
                        'status' => 1,
                        'fac' => $student->first()->fac,
                        'biller_id' => auth()->user()->id
                    ]); 
                }
            }else{
                return $this->sendError('error', 'no amount to payed it');
            }
            // update the student status to be payed one
            $student_status = DB::connection('mysql2')->table('students_payments')->where('sno',$sno)->where('status', 0)->update([
                'status' => 1,
                'uuid' => $data['uuid']
            ]);

            // if he have installment then update the collectionDate of installment table to the currect date update installments to new data

            #update to new data 
            $installments_update = DB::connection('mysql2')->table('installments')->where('sno', $sno)->where('registration_id',$registration_id)->where('status',0)->update([
                'colectionDate' => $time,
                'uuid' => $data['uuid'],
                'status' => 1,
            ]);

            #update to next payed status
            $installments_update2 = DB::connection('mysql2')->table('installments')->where('sno', $sno)->where('registration_id',$registration_id)->where('status',1)->where('uuid',null)->limit(1)->update([
                'status' => 0,
                'colectionDate' => null,
            ]);


            // start send sms to statudent;
            $phone = $data['phone'];
            $curl = curl_init();
            $text1 = 'تم سداد ';
            $payed = $data['total'];
            $text2 = ' كرسوم دراسية للطالب ';
            $name = $student->first()->sname;
            $message = $text1 . $payed . $text2 . $name;
            $from = "eaeu.edu.sd";
            $key = 'Z0JxbmJid2Jrbm5qaU5NZWpsSWs=';


            // curl_setopt_array($curl, array(
            //   CURLOPT_URL => "http://mazinhost.com/smsv1/sms/api",
            //   CURLOPT_RETURNTRANSFER => true,
            //   CURLOPT_ENCODING => "",
            //   CURLOPT_MAXREDIRS => 10,
            //   CURLOPT_TIMEOUT => 0,
            //   CURLOPT_FOLLOWLOCATION => true,
            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //   CURLOPT_CUSTOMREQUEST => "POST",
            //   CURLOPT_POSTFIELDS => "action=send-sms&api_key=$key&to=249$phone&from=$from&sms=$message&unicode=1",
            // ));

            // $response = curl_exec($curl);

            // curl_close($curl);

            // $response = json_decode($response,true);
            // end send sms to student

            $response = 'ok';

            // return the result to the api
            return $this->sendResponse(['success' => 'student payed updateing successfully', 'sms' => $response], 'The request was successfully completed');

        }

    }
    /*
        =================================================
        ================= end  payapi ===================
        ================================================= 
    */
    

    /*
        ======================================================
        =================== start  retreat ===================
        ====================================================== 
    */
    public function retreat(Request $request){

        /*
            ******************* Start Validate Request *******************

            [ 1 ] if sno is exists in request and numer type and it is exists in students_payments table
        */

        // amke the validate and stor the result in validator varibal
        $validator = Validator::make($request->all(), [
            'sno' => 'required|numeric|exists:mysql2.students_payments',
            'uuid' => 'required|exists:mysql2.payments',
            'bank_date' => 'required|exists:mysql2.payments',
            'amount' => 'required|numeric',
            'phone' => 'required|numeric'
        ],[
            'sno.required' => 'student number is not found',
            'sno.numeric' => 'student number is not a number type',
            'sno.exists' => 'student number is not exists in our data',
            'uuid.required' => 'uuid number is not found',
            'uuid.exists' => 'uuid is not exists in our data',
            'bank_date.required' => 'bank date is not found',
            'bank_date.exists' => 'The bank date and time is not correct',
            'amount.required' => 'amount is not found',
            'amount.numeric' => 'numeric is not number type',
            'phone.required' => 'phone number is not found',
            'amount.numeric' => 'phone number is not number type',
        ]);

        // get all data in this varibale
        $data = $request->all();

        // global variable
        $amount = 0;


        // If there is a problem with the validation, return the error message, or else continue with the algorithm
        if($validator->fails()) {
            return $this->sendError('error falidator', $validator->errors());
        }else{

            // chek where is the a amount

            // get all the student data that have zero status value
            $student = DB::connection('mysql2')->table('students_payments')->where('sno', $data['sno'])->orderBy('sno','DESC')->get();
            // get all the students_payments_details_id data from students payments
            $students_payments_details_id  = DB::connection('mysql2')->table('students_payments')->where('sno', $data['sno'])->first()->students_payments_details_id;
            // get all the registration_id data from students payments details
            $registration_id = DB::connection('mysql2')->table('students_payments_details')->where('id', $students_payments_details_id)->first()->registration_id;
            // get all the installments data 
            $installments = DB::connection('mysql2')->table('installments')->where('sno', $data['sno'])->where('registration_id',$registration_id)->orderBy('id','DESC')->get();

            // get the student payed status registration_id
            foreach ($student as $key => $studentData) {
                if ($studentData->status == 1) {
                    switch (true) {
                        case $studentData->fees_type_id == 1:
    
                            if($studentData->installment == 1){
                                foreach($installments as $key => $inst){
                                    if($inst->colectionDate != null){
                                        $amount = $inst->amount;
                                    }
                                }
                            }else{
                                $amount = $studentData->amount;
                            }
    
                            break;
                        case $studentData->fees_type_id != 1:
                            $amount = $amount + $studentData->amount;
                            break;
                    }
                }
            }

            // validate if the student is allrady retrated in status variable
            $status = $amount != 0 ? 1 : 0 ;
            if ($status == 0) {
                return $this->sendError('error falidator', 'The payment has been reversed to the student in advance');
            }else{

                // update the student to 0 status
                DB::connection('mysql2')->table('students_payments')->where('sno', $data['sno'])->where('status', 1)->where('uuid', $data['uuid'])->update([
                    'status' => 0
                ]);

                // upadet the payments to -1 payments
                DB::connection('mysql2')->table('payments')->where('sno', $data['sno'])->where('status', 1)->where('uuid', $data['uuid'])->where('bank_date', $data['bank_date'])->update([
                    'status' => -1
                ]);


                #update to last payed status
                $installments_update2 = DB::connection('mysql2')->table('installments')->where('sno', $data['sno'])->where('registration_id',$registration_id)->where('status',0)->where('uuid',null)->limit(1)->update([
                    'status' => 1,
                    'colectionDate' => null,
                    'uuid' => null
                ]);

                // get all the installments data 
                $id = DB::connection('mysql2')->table('installments')->where('sno', $data['sno'])->where('registration_id',$registration_id)->where('colectionDate', '!=', null)->where('uuid', '=', $data['uuid'])->where('status', 1)->limit(1)->update([
                    'colectionDate' => null,
                    'uuid' => null,
                    'status' => 0
                ]);

                }

                // start send sms to statudent;
                $phone = $data['phone'];
                $curl = curl_init();
                $text1 = 'تم التراجع عن سداد مبلغ ';
                $payed = $data['amount'];
                $text2 = ' للطالب ';
                $name = $student->first()->sname;
                $message = $text1 . $payed . $text2 . $name;
                $from = "eaeu.edu.sd";
                // $encodeMSg = urldecode($msg);
                // $message = $encodeMSg;
                $key = 'Z0JxbmJid2Jrbm5qaU5NZWpsSWs=';


                // curl_setopt_array($curl, array(
                //   CURLOPT_URL => "http://mazinhost.com/smsv1/sms/api",
                //   CURLOPT_RETURNTRANSFER => true,
                //   CURLOPT_ENCODING => "",
                //   CURLOPT_MAXREDIRS => 10,
                //   CURLOPT_TIMEOUT => 0,
                //   CURLOPT_FOLLOWLOCATION => true,
                //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                //   CURLOPT_CUSTOMREQUEST => "POST",
                //   CURLOPT_POSTFIELDS => "action=send-sms&api_key=$key&to=249$phone&from=$from&sms=$message&unicode=1",
                // ));

                // $response = curl_exec($curl);

                // curl_close($curl);

                // $response = json_decode($response,true);

                $response = 'OK';
            // return the result to the api
            return $this->sendResponse(['success' => 'student payed updateing successfully', 'sms' => $response], 'The request was successfully completed');

        }


    }
    /*
        ======================================================
        =================== end  retreat ===================
        ====================================================== 
    */

}
