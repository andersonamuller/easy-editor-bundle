<?php

namespace Adeliom\EasyEditorBundle\DataCollector;

use Adeliom\EasyEditorBundle\Block\Helper;
use Symfony\Bundle\FrameworkBundle\DataCollector\AbstractDataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class EditorCollector extends AbstractDataCollector
{
    /**
     * @var Helper
     */
    protected $blockHelper;

    public function __construct(Helper $blockHelper)
    {
        $this->blockHelper = $blockHelper;
    }

    public function collect(Request $request, Response $response, \Throwable $exception = null): void
    {
        $this->data["blocks"] = $this->blockHelper->getTraces();
    }

    /**
     * @return array
     */
    public function getBlocks()
    {
        return $this->data['blocks'] ?: [];
    }

    public function getName(): string
    {
        return self::class;
    }
}
