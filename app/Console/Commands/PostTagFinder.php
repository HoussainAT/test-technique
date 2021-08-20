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
        $tag = $this->ask("Veuillez entrer le tag voulu parmi:  1=HTML, 2=CSS, 3=JavaScript et 4=PHP"); 

        $this->info("Voici la liste des posts avec le tag choisi");
        $this->line(Post::whereHas('tags', function($query) use ($tag) { $query->where('tags.id', $tag);})->get()->pluck('title'));
    }
    
    
}


// $this->info(Tag::all('name')->get($tag));

// $this->info(Post::where(
//     ['tags' => function ($query) use($tag) { $query->where('name', $tag->name);
//     }])->get());

// $this->info(Tag::find($tag)->pluck('name', $tag));

// $this->info(Post::whereHas('tags', function($query) use ($tag) { $query->where('id', $tag);})->get());
// $this->info(Post::PostTagFinder()->get()->pluck('title'));