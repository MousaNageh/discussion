<?php

use App\Channel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str ; 
class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            "name"=>"laravel 7" ,
            "slug"=>Str::slug("lavavel 7")  
            
        ]) ; 
        Channel::create([
            "name"=>"vue js" ,
            "slug"=>Str::slug("vue js")  
            
        ]) ; 
        Channel::create([
            "name"=>"wordpress desgin" ,
            "slug"=>Str::slug("wordpress design")  
            
        ]) ; 
        Channel::create([
            "name"=>"glup js" ,
            "slug"=>Str::slug("glup js")  
            
        ]) ; 
        Channel::create([
            "name"=>"angular js" ,
            "slug"=>Str::slug("angular js")  
            
        ]) ; 
    }
}
