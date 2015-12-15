<?php


class PagesText extends \PHPUnit_Framework_TestCase
{
    public function testHomePage()
    {
        $response_code = $this->crawl('http://modern.dev/');
        $this->assertEquals(200, $response_code);
    }

    public function testPageNotFound()
    {
        $response_code = $this->crawl('http://modern.dev/dfdf');
                $this->assertEquals(302, $response_code);
    }

    public function crawl($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        $response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        return $response_code;
    }
}
