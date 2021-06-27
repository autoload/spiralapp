<?php

/**
 * This file is part of Spiral package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Controller;

use App\Job\Ping;
use Spiral\Prototype\Traits\PrototypeTrait;

class HomeController
{
    use PrototypeTrait;

    /**
     * @return string
     */
    public function index(): string
    {
        $md = $this->showMDByName();
        return $this->views->render('home.dark.php',['md' => $md]);
    }

    /**
     * Example of exception page.
     *
     * @throws \Error
     */
    public function exception(): void
    {
        echo $undefined;
    }

    /**
     * @return string
     */
    public function ping(): string
    {
        $jobID = $this->queue->push(Ping::class, [
            'value' => 'hello world',
        ]);

        return sprintf('Job ID: %s', $jobID);
    }

    /**
     * @return string
     */
    private function showMDByName($name = 'test'): string
    {
        $str = '';
        $file_path = directory('public') . '/md/'.$name.'.md' ;
        if ( file_exists ($file_path))
        {
            $fp = fopen ($file_path , "r");
            $str = fread ($fp , filesize($file_path));
            fclose($fp);
        }
        return $str;
    }
}
