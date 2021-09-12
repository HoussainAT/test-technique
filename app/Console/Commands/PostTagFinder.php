<?php

namespace App\Console\Commands;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;

class PostTagFinder extends Command
{
    public $tag;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posttag:finder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Voir les posts avec le tag selectionné';

    /**
     * Create a new command instance.
     *
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tag = $this->ask("Entrez un chiffre"); 
        $finder = Post::tagFinder($tag)->pluck("title");
        $headers = ['Post', 'Tag'];
        $title = [ 
            [$finder],
            ['' ,$tag]
        ];

        $this->info("Voici un tableau des posts avec le tag choisi : ");
        $this->table($headers, $title);
        
    }
    
    
}