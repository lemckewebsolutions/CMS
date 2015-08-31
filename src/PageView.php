<?php
namespace LWS\CMS;

use LWS\Framework\Context;
use LWS\Framework\View;

class PageView extends View
{
    public function parse()
    {
        $this->assignVariable("footer", $this->parseFooter());
        $this->assignVariable("head", $this->parseHead());

        return parent::parse();
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function parseFooter()
    {
        return $this->includeTemplate(static::getTemplateRoot() . "layout/footer.inc.tpl");
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function parseHead()
    {
        return $this->includeTemplate(
            static::getTemplateRoot() . "layout/head.inc.tpl"
        );
    }

    public static function getTemplateRoot()
    {
        $configuration = Context::getConfiguration();

        return $configuration["CMS"]["TemplateRoot"];
    }
}