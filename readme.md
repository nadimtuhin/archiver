# Zip Archiver

PHP library for creating password-protected zip archives via Symfony Process.

## Install

```json
{
    "require": {
        "nadimtuhin/archiver": "0.1.*@dev"
    }
}
```

## Usage

```php
$process = new Symfony\Component\Process\Process();
$zipper = new NadimTuhin\Archiver\ZipArchiver($process);
$zipper->setInputFilename("myfile.txt");
$zipper->setPassword("1234");
$zipper->archive();
```
