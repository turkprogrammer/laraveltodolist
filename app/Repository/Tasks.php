<?

namespace App\Repository;

use App\Models\Task;
use Carbon\Carbon;

class Tasks
{

    CONST CACHE_KEY = 'TASKS';

    public function all($orderBy){

        $key = "all.{$orderBy}";
        $cachekey = $this->getCacheKey($key);

        return cache()->remember($cachekey, Carbon::now()->addMinutes(5), function() use($orderBy){
            return Task::orderBy($orderBy)->get();
        });
        //return Task::orderBy('id', 'desc')->paginate(7);
    }

    public function get($id){
        $key = "get.{$id}";
        $cachekey = $this->getCacheKey($key);
        return cache()->remember($cachekey, Carbon::now()->addMinutes(5), function() use($orderBy){
            return Task::with('title')->where('id', $id)->first();
        });
    }

    public function getCacheKey($key){
        $key = strtoupper($key);
        return self::CACHE_KEY .".$key";
    }
}
