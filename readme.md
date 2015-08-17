# Zip Archiver

## Install 
install using composer
```json
{
    "require": {
        "nadimtuhin/archiver": "0.1.*@dev"
    }
}
```

## How to use
```php
$process = new Symfony\Component\Process\Process();
$zipper = new NadimTuhin\Archiver\ZipArchiver($process);
$zipper->setInputFilename("myfile.txt");
$zipper->setPassword("1234");
$zipper->archive();
```
