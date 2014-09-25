<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {

        DB::table('users')->delete();

        $names = explode(',', "Peter,Benjamin,Johan,Mason,Jacob,Madison,Jackson,Amelia,Lily,Samuel");
        for($i=1; $i<=10; $i++) {
            User::create(array(
                'name' => $names[$i-1],
                'username' => strtolower($names[$i-1]),
                'email' => strtolower($names[$i-1])."@schoolido.com",
                'password' => Hash::make('123456')
            ));
        }

    }

}
