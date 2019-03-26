<?php

namespace App\Provider;

use App\Model\Response\EntryPage;

interface EntryPageProviderInterface
{
    public function getPage(int $page): EntryPage; 
}
