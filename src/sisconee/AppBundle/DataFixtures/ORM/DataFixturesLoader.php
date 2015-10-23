<?php
/**
 * Created by PhpStorm.
 * User: celma
 * Date: 03/03/2015
 * Time: 12:56
 */

namespace sisconee\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use sisconee\AppBundle\Entity\Entidad;
use sisconee\AppBundle\Entity\LecturaDiariaServicio;
use sisconee\AppBundle\Entity\PlanAnualEntidad;
use sisconee\AppBundle\Entity\PlanAnualServicio;
use sisconee\AppBundle\Entity\PlanMensualServicio;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints\False;


class DataFixturesLoader extends AbstractFixture
{
    private $manager;
    private $organismCode = 211;
    private $year = 2013;

    public function load(ObjectManager $manager)
    {

        $this->manager = $manager;

        $relativeDir = substr(__DIR__, 0, -3);

        /*$this->loadOrganisms($relativeDir . 'Data\ORGA.csv');
        $this->loadProvincias($relativeDir . 'Data\Provincias.csv');
        $this->loadMunicipios($relativeDir . 'Data\Municipios.csv');
        $this->loadNAE($relativeDir . 'Data\NAE_CategoriasPrincipales.csv');*/
//        $this->loadEntities($relativeDir . 'Data\EntidadesREEUP.csv');

//        $this->loadServices($relativeDir . 'Data\Servicios_PlanesMensuales(CITMA_2013).csv');

//        $this->loadPlansFromCsvFiles($relativeDir.'Data\Planes');
        $dir = $relativeDir . 'Data\Planes';
        /* var_dump('es dir!!!'. is_dir($dir));
         $entries = scandir($dir);
         //var_dump($entries);

         foreach ($entries as $e)
             //if (is_dir($e)) {
                 var_dump(is_dir($e));//}
         $this->testingScan($dir);*/

//        $this->loadPlansFromCsvFiles($dir);

//        $this->loadServiceAnnualPlans();

       $this->loadEntityAnnualPlans();
//
        //testing load data with transform functions
        //$this->loadSomeMunicipios($relativeDir . 'Data\Municipios_test.csv');

        //testing load entities
        /*$this->loadEntitiesData(
            $manager,
            'sisconee\AppBundle\Entity\Entidad',
            [
                ['10', 'nombre10', 'siglas10', '102', '7513', '2304'],
                ['20', 'nombre20', '- - - - -', '102', '7513', '2304'],
                ['30', 'nombre30', '-  -  -  -  -', '102', '7513', '2304']

            ],
            ['0' => 'codReeup', '2' => 'siglas', 3 => 'organismo', 4 => 'nae', 5 => 'provincia'],
            $categoriesRelationship
        );*/

        //testing load data
        // $objects = $this->loadDataTest($manager, 'sisconee\AppBundle\Entity\Entidad', [[10,'nombre10', 'siglas10'],[20,'nombre20', 'siglas20']] , ['0'=>'CodReeup', '2'=>'Siglas']);
        // var_dump($objects);
        /* $fieldName = 'codReeup';
         var_dump(strtoupper($fieldName[0]).substr($fieldName,1, strlen($fieldName)-1));
         var_dump(substr($fieldName,1, -0));
         var_dump(strlen($fieldName)-1);*/

        //testing nae categories
        /* $fileName = $relativeDir . 'Data\DivisionesNAE.csv';
         $categoriesRelationship = $this->getDataFromCSVFile($fileName);
         var_dump($this->getCategoryFromSubcategory($categoriesRelationship, '7513' ));*/

        //testing change csv file
//        $this->changeCSVFileTest();
//        $this->fixServicesFile();

//        var_dump($this->toLower('TEstInG'));

    }

    function loadOrganisms($fileName)
    {
        var_dump('loading organismos...');

        $organismsData = $this->getDataFromCSVFile($fileName, true);
        $desiredCols = [0 => 'codigo', 1 => 'nombre', 2 => 'siglas'];
        $this->loadData($organismsData, 'sisconee\AppBundle\Entity\Organismo', $desiredCols, ['activo' => 1]);
    }

    function loadProvincias($fileName)
    {
        var_dump('loading provincias...');

        $provinciasData = $this->getDataFromCSVFile($fileName, true);
        $desiredCols = [0 => 'codigo', 1 => 'descripcion'];
        $this->loadData($provinciasData, 'sisconee\AppBundle\Entity\Provincia', $desiredCols);
    }

    function loadMunicipios($fileName)
    {
        var_dump('loading municipios...');

        $municipiosData = $this->getDataFromCSVFile($fileName, true);
        $desiredCols = [0 => 'codigo', 1 => 'descripcion'];
        $this->loadData($municipiosData, 'sisconee\AppBundle\Entity\Municipio', $desiredCols);

        var_dump('assigning provincia to municipios...');
        $this->loadProvinciasIds();
    }

    function loadNAE($fileName)
    {
        var_dump('loading nae...');

        $naeData = $this->getDataFromCSVFile($fileName, true);
        $desiredCols = [0 => 'codigo', 1 => 'descripcion'];
        $this->loadData($naeData, 'sisconee\AppBundle\Entity\Nae', $desiredCols);
    }

    function loadServices($fileName)
    {
        var_dump('loading services...');

        $naeData = $this->getDataFromCSVFile($fileName, true);
        $desiredCols = [
            0 => [
                'provincia',
                function ($x) {
                    return $this->transformProvinciaCodeToProvincia($x);
                },
                null
            ],
            1 => ['codClienteEE', null, null],
            2 => ['codRutaFolio', null, null],
            3 => ['nombre', null, null],
            4 => [
                'entidad',
                function ($x) {
                    return $this->transformServiceCodReeupToEntity($x);
                },
                null
            ]
        ];
        $this->loadData(
            $naeData,
            'sisconee\AppBundle\Entity\Servicio',
            $desiredCols,
            ['activo' => 1, 'horarioPico' => 0]
        );
    }

    function transformServiceCodReeupToEntity($colData)
    {
        $code = $this->normalizeServiceCodeReeup($colData);
        $parent = $this->manager->getRepository('sisconeeAppBundle:Entidad')->findOneByCodReeup($code);
        if ($parent != null) {
            return $parent;
        }

        //if the service has not assigned entity put it as a service of base entity
        $currentOrganism = $this->manager->getRepository('sisconeeAppBundle:Organismo')->findOneByCodigo(
            $this->organismCode
        );

        return $this->manager->getRepository('sisconeeAppBundle:Entidad')->getBaseEntity($currentOrganism->getId());
    }

    function loadEntities($fileName)
    {
        var_dump('loading entidades...');

        $entitiesData = $this->getDataFromCSVFile($fileName, true);

        $desiredCols = [
            0 => [
                'codReeup',
                function ($x) {
                    return $this->transformCodReeupData($x);
                },
                null
            ],
            1 => ['nombre', null, null],
            2 => [
                'siglas',
                function ($x) {
                    return $this->transformSiglasData($x);
                },
                null
            ],
            3 => ['direccion', null, null],
            4 => [
                'provincia',
                function ($x) {
                    return $this->transformMunicipioCodeToProvincia($x);
                },
                null
            ],
            5 => [
                'organismo',
                function ($x) {
                    return $this->transformOrganismData($x);
                },
                function ($x) {
                    return $this->filterByOrganism($x);
                }
            ],
            6 => [
                'nae',
                function ($x) {
                    return $this->transformNaeData($x);
                },
                null
            ]
        ];
        $this->loadData(
            $entitiesData,
            'sisconee\AppBundle\Entity\Entidad',
            $desiredCols,
            ['activo' => 1]
        );
        var_dump('loading entidades padres...');
        $this->loadParentEntities($entitiesData);
    }

    function transformOrganismData($colData)
    {
        return $this->manager->getRepository('sisconeeAppBundle:Organismo')->findOneByCodigo($colData);
    }

    function transformNaeData($colData)
    {
        $relativeDir = substr(__DIR__, 0, -3);
        $categoriesRelationshipData = $this->getDataFromCSVFile($relativeDir . 'Data\DivisionesNAE.csv', false);
        $categoryCode = $this->getCategoryFromSubcategory($categoriesRelationshipData, $colData);
        $nae = $this->manager->getRepository('sisconeeAppBundle:Nae')->findOneByCodigo($categoryCode);

        return $nae;
    }

    function transformMunicipioCodeToProvincia($colData)
    {
        $pCode = ($colData == 4001) ? 400 : $colData[0] . $colData[1]; //400-Isla de la Juventud
        return $this->manager->getRepository('sisconeeAppBundle:Provincia')->findOneByCodigo($pCode);
    }

    function transformProvinciaCodeToProvincia($colData)
    {
        if ($colData == 36) //Isla de la Juventud
        {
            $colData = 400;
        }

        return $this->manager->getRepository('sisconeeAppBundle:Provincia')->findOneByCodigo($colData);
    }

    function transformSiglasData($colData)
    {
        return mb_substr_count($colData, '-') >= 3 ? $colData = null : $colData; //'- - - - - - - -'
    }

    function transformCodReeupData($colData)
    {
        return $this->normalizeEntityCodeReeup($colData);
    }

    function filterByOrganism($colData)
    {
        return $colData == $this->organismCode;
        //load entites that belong to CITMA (code=211)*/
    }

    //for testing
    function loadSomeMunicipios($fileName)
    {
        $organismsData = $this->getDataFromCSVFile($fileName, true);
        $desiredCols = [
            0 => [
                'codigo',
                function ($x) {
                    return $x . '123';
                },
                function ($x) {
                    return $x >= 9105;
                }
            ],
            1 => [
                'descripcion',
                function ($x) {
                    return $this->test($x);
                },
                null
            ]
        ];
        $this->loadData($organismsData, 'sisconee\AppBundle\Entity\Municipio', $desiredCols, [false, null]);
    }

    function  test($x)
    {
        return $x . '_transformed';
    }

    /**
     * Load data from an array with csv elements to the database allowing to transform it...
     * @param array $data The data to be loaded
     * @param $className Name of the class mapped to the table that correspond to the data
     * @param $desiredCols Associative array with the index of columns that you want to include and an array with
     * the property name, a transformation function or null if the same data is required and a filter function or null if always include the data
     * Ej: [3=>['Code',func($x){return $x';}, func($x){return true;}]].
     * @param array $extraData Associative array with extra data (property name and default value) to include...Ej:['activo'=>1, 'horarioPico'=>0]
     */
    function loadData(array $data, $className, $desiredCols, array $extraData = null)
    {
        $i = 0;
        foreach ($data as $d) {
            $i++;
            var_dump('---------------' . 'loading data ' . $i . '...' . '---------------');
            $object = new $className();
            $persist = true;

            foreach (array_keys($desiredCols) as $col) {
                $colData = $d[$col];
                $fieldName = $desiredCols[$col][0];
                $transformer = $desiredCols[$col][1];
                $filter = $desiredCols[$col][2];
                if ($filter != null && !$filter($colData)) {
                    $persist = false;
                    break;
                }
                $fieldName = strtoupper($fieldName[0]) . substr($fieldName, 1, strlen($fieldName) - 1);
                $method = 'set' . $fieldName;
                var_dump('adding property: ' . $fieldName . ' with data: ' . $colData);
                if ($transformer != null) {
                    $colData = $transformer($colData);
                }
                $object->$method($colData);
            }

            if ($persist) {
                /*if($activeProperty[0])
                    $object->setActivo($activeProperty[1]);*/
                if ($extraData != null) {
                    foreach (array_keys($extraData) as $property) {
                        $fieldName = strtoupper($property[0]) . substr($property, 1, strlen($property) - 1);
                        $method = 'set' . $fieldName;
                        $defaultValue = $extraData[$property];
                        $object->$method($defaultValue);
                    }
                }
                $this->manager->persist($object);
            }

            var_dump('---------------' . 'end data ' . $i . '-----------------');

        }

        $this->manager->flush();
    }

    /*function loadPlansData(array $serviceMensualPlans)
    {
        foreach($serviceMensualPlans as $plans)
        {
            $serviceCodCli = $plans[0];
            $service = $this->manager->getRepository('sisconeeAppBundle:Servicio')->findOneByCodClienteEE($serviceCodCli);
            if($service!=null) {
                for ($i = 1; $i <= 12; $i++) //ene to dic
                {
                    $monthPlan = $plans[$i];
                    $newMensualPlan = new PlanMensualServicio();
                    $newMensualPlan->setServicio($service);
                    $newMensualPlan->setPlan()
            }
            }
        }
    }*/

    function testingScan($dir)
    {
        $entries = scandir($dir);
        foreach ($entries as $e) {
            if (is_dir($e)) {
                var_dump($e);
                foreach (scandir($e) as $file) {
                    if (is_file($file)) {
                        var_dump($file);
                    }
                }
            }
        }
    }

    function loadPlansFromCsvFiles($dir)
    {

        var_dump('loading daily and mensual plans for the services...');
        var_dump($dir);
        $em = $this->manager;
        $entries = scandir($dir);
        $i=0;
        foreach ($entries as $e) {
            $i++;
            var_dump('parsing files in folder '.$i);
            $subdir = $dir . '\\' . $e;
            if (is_dir($subdir) && $e != '.' && $e != '..') {
                foreach (scandir($subdir) as $file) {
                    $csvFile = $subdir . '\\' . $file;

                    if (is_file($csvFile) && pathinfo($csvFile)['extension'] == "csv") {
                        $fileHandle = fopen($csvFile, "r");
                        $row = 0;
                        $date = "";
                        while (($data = fgetcsv($fileHandle, 1000, ",")) != false) {
                            if ($row == 3) { // extract day here
                                $date = date_parse($data[5]);
                                //var_dump ("Loading plan for day: ".$date['day'].'/'.$date['month']);
                            }
                            if ($row >= 6) {
                                if (is_numeric($data[0])) {
                                    $code = $data[1];
                                    $service = $em->getRepository('sisconeeAppBundle:Servicio')->findOneByCodClienteEE(
                                        $code
                                    );

                                    if ($service == null) {
                                        continue;
                                    }

                                    $lecturaDiariaActual = $em->getRepository(
                                        'sisconeeAppBundle:LecturaDiariaServicio'
                                    )->getLectura($date['day'], $date['month'], $date['year'], $service->getId());
                                    if ($lecturaDiariaActual == null) // no existe el valor en la base de datos
                                    {
                                        $planDia = $data[6];
                                        $consumoDia = $data[7];

                                        $lecturaDiariaActual = new LecturaDiariaServicio();
                                        $lecturaDiariaActual->setPlan($planDia);
                                        $lecturaDiariaActual->setConsumo($consumoDia);
                                        $lecturaDiariaActual->setIdServicio($service);
                                        $dateDT = date_create();
                                        date_date_set($dateDT, $date['year'], $date['month'], $date['day']);
                                        $lecturaDiariaActual->setFecha($dateDT);
                                        $em->persist($lecturaDiariaActual); //plandiario
                                        $this->manager->flush();

                                        //var_dump ('saving service '.$service->getId());
                                    } else {
                                        //var_dump("Existe " . date_format($lecturaDiariaActual->getFecha(), "m:d:y"));
                                    }

                                    $lecturaMensual = $em->getRepository(
                                        'sisconeeAppBundle:PlanAnualEntidad'
                                    )->getPlanOfAServiceInAMonthYear($service, $date['month'], $date['year']);
                                    if ($lecturaMensual == null) {
                                        $planMensualValue = $data[5];

                                        $planMensual = new PlanmensualServicio();
                                        $planMensual->setPlan($planMensualValue);
                                        $planMensual->setServicio($service);
                                        $planMensual->setMes($date['month']);
                                        $planMensual->setAnno($date['year']);
                                        $em->persist($planMensual); //planmensual
                                        $this->manager->flush();
                                    }

                                }
                            }
                            $row++;
                        }

                        $this->manager->flush();
                    }
                }
            }
        }
    }

    private function loadServiceAnnualPlans()
    {
        $services = $this->manager->getRepository('sisconeeAppBundle:Servicio')->findAll();
        foreach ($services as $s) {
            var_dump('Loading annual plan for service '.$s->getNombre(). ' ..........');
            $mensualPlans = $this->manager->getRepository(
                'sisconeeAppBundle:PlanMensualServicio'
            )->getMonthlyPlansOfAServiceInAYear($s, $this->year);
            $plan = 0;
            foreach ($mensualPlans as $mp) {
                $plan += $mp->getPlan();
            }

            $annualPlan = $this->manager->getRepository(
                'sisconeeAppBundle:PlanMensualServicio'
            )->getServiceAnnualPlanObjectInAYear($s, $this->year);
            if ($annualPlan != null) //already exists this annual plan in db
            {
                $annualPlan->setPlan($plan);
            } else {
                $annualPlan = new PlanAnualServicio();
                $annualPlan->setServicio($s);
                $annualPlan->setAnno($this->year);
                $annualPlan->setPlan($plan);
            }
            $this->manager->persist($annualPlan);
        }
        $this->manager->flush();
    }

    private function loadEntityAnnualPlans()
    {
        $entities = $this->manager->getRepository('sisconeeAppBundle:Entidad')->findAll();
        foreach ($entities as $e) {
            var_dump('Loading annual plan for entity '.$e->getNombre(). ' ..........');
            $subordinatedServices = $this->manager->getRepository(
                'sisconeeAppBundle:Servicio'
            //)->findAllBelongToEnt($e);
            )->servicesSubordinated($e);

            $entityPlan = 0;
            foreach ($subordinatedServices as $s) {
                $serviceAnnualPlan = $this->manager->getRepository('sisconeeAppBundle:PlanAnualServicio')->getServiceAnnualPlanObjectInAYear($s, $this->year);
                if($serviceAnnualPlan!=null)
                    $entityPlan+=$serviceAnnualPlan->getPlan();
            }

            $entityAnnualPlan = $this->manager->getRepository(
                'sisconeeAppBundle:PlanAnualEntidad'
            )->getAnnualPlanOfEntityInAYear($e, $this->year);
            if ($entityAnnualPlan != null) //already exists this annual plan in db
            {
                $entityAnnualPlan->setPlan($entityPlan);
            } else {
                $entityAnnualPlan = new PlanAnualEntidad();
                $entityAnnualPlan->setEntidad($e);
                $entityAnnualPlan->setAnno($this->year);
                $entityAnnualPlan->setPlan($entityPlan);
            }
            $this->manager->persist($entityAnnualPlan);
        }
        $this->manager->flush();
    }

    /**
     * Returns the code of category that a determined subcategory  belongs to or null if it belongs to no one.
     * @param $categoriesRelationship The relationship between subcategory code and category code
     * @param $subcategoryCode The code of subcategory to determine his category
     * @return null
     */
    function getCategoryFromSubcategory($categoriesRelationship, $subcategoryCode)
    {
        $subcategoryCode = substr($subcategoryCode, 0, 2);
        foreach ($categoriesRelationship as $r) {
            $range = $r[1];
            $min = explode('-', $range)[0];
            $max = explode('-', $range)[1];

            if ($subcategoryCode >= $min && $subcategoryCode <= $max) {
                return $r[0];
            }
        }

        return null;
    }

    /**
     * Assign to entities her corresponding parent entity
     * @param array $entitiesData Array with csv elements that represent each entity (col 10 - info corresponding to parents; col 0 - entity codes)
     */
    function loadParentEntities(array $entitiesData)
    {
        foreach ($entitiesData as $d) {
            $entityCode = $d[0];
            $currentEntity = $this->manager->getRepository('sisconeeAppBundle:Entidad')->findOneByCodReeup($entityCode);
            if ($currentEntity != null) {
                $parentCode = $this->normalizeEntityCodeReeup($d[10]);
                $parentEntity = null;
                if ($parentCode != "")  //is not the organism base entity
                {
                    $parentEntity = $this->manager->getRepository('sisconeeAppBundle:Entidad')->findOneByCodReeup(
                        $parentCode
                    );
                }
                $currentEntity->setEntidadPadre($parentEntity);
                $this->manager->persist($currentEntity);
                var_dump(
                    'assigning to ' . $currentEntity->getNombre(
                    ) . ' the entity ' . ($parentEntity == null ? 'NULL' : $parentEntity->getNombre(
                    )) . '(' . $parentCode . ')' . ' as his parent.'
                );

            }
        }
        $this->manager->flush();
    }

    //get 5 last digits of code...
    function  normalizeServiceCodeReeup($code)
    {
        $len = strlen($code);
        $diff = abs($len - 5);

        $normalizedCode = '00000';
        $until = max(0, $len - 5);
        for ($i = $len - 1; $i >= $until; $i--) {
            $index = $len > 5 ? $i - $diff : $i + $diff;
            $normalizedCode[$index] = $code[$i];
        }

        return $normalizedCode;
    }

    //removing unnecessary left zeros of codes (all codes have 5 digits) --- ej.00211 cod del ministerio CITMA
    function normalizeEntityCodeReeup($code)
    {
        $len = strlen($code);
        $diff = abs($len - 5);

        if ($len <= 0 || $len == 5) {
            return $code;
        }

        //fill with zeros until 5 digits
        if ($len < 5) {
            $normalized = '00000';
            for ($i = 0; $i < $len; $i++) {
                $normalized[$i + $diff] = $code[$i];
            }

            return $normalized;
        }

        //removing extra zeros (len>5)
        $p = 0;
        while ($p - $diff < 0 && $code[0] == 0) {
            $p++;
            $code = substr($code, 1, $len - 1);
        }

        return $code;
    }

    //assigning to municipios her corresponding provincia
    function loadProvinciasIds()
    {
        $municipios = $this->manager->getRepository('sisconeeAppBundle:Municipio')->findAll();
        foreach ($municipios as $m) {
            $mCode = $m->getCodigo();

            $pCode = ($mCode == 4001) ? 400 : $mCode[0] . $mCode[1]; //400-Isla de la Juventud
            $provincia = $this->manager->getRepository('sisconeeAppBundle:Provincia')->findOneByCodigo($pCode);
            $m->setProvincia($provincia);
            $this->manager->persist($m);
        }
        $this->manager->flush();
    }

    //get data from file with csv format into an array
    function getDataFromCSVFile($fileName, $skipFirstLine)
    {
        //$data is an array with each line of csv file
        $data = [];
        $file = fopen($fileName, 'r');
        if ($skipFirstLine) {
            fgetcsv($file, 0, ';');
        }
        while (($line = fgetcsv($file, 0, ';')) !== false) {
            //$line is an array of the csv elements
            array_push($data, $line);
        }
        fclose($file);

        return $data;
    }

    function changeCSVFileTest()
    {
        $relativeDir = substr(__DIR__, 0, -3);
        $fileName = $relativeDir . 'Data\test.csv';
        $fileoutName = $relativeDir . 'Data\testOut.csv';

        $file = fopen($fileName, 'r');
        $fileOut = fopen($fileoutName, 'w');


        while (($line = fgetcsv($file, 0, ';')) !== false) {
            //$line is an array of the csv elements
            $line[0] = $line[0] . '_' . $line[2];
            fputcsv($fileOut, $line, ';');
        }

        fclose($file);
        fclose($fileOut);
    }

    function  toLower($text)
    {
        for ($i = 0; $i < strlen($text); $i++) {
            $text[$i] = strtolower($text[$i]);
        }

        return $text;
    }

    function fixServicesFile()
    {
        $relativeDir = substr(__DIR__, 0, -3);
        $fileName = $relativeDir . 'Data\Servicios_PlanesMensuales(CITMA_2013)_original.csv';
//        $fileName = $relativeDir . 'Data\test.csv';

        $fileoutName = $relativeDir . 'Data\out.csv';

        $file = fopen($fileName, 'r');
        $fileOut = fopen($fileoutName, 'w');

//        fgetcsv($file, 0, ';');

        $clientCodes = [];
        $repeatedClientCodes = [];
        $rfCodes = [];
        $repeatedRFCodes = [];

        $i = 0;
        while (($line = fgetcsv($file, 0, ';')) !== false) {
            $i++;
            var_dump('Parsing line' . $i . '.....');
            //$line is an array of the csv elements

            //CODCLI
            $line[1] = $line[1] == "" ? substr($line[3], 0, 3) . '_CODCLI' : $line[1];
            $codcli = $line[1];
            $loweredCodcli = $this->toLower($codcli);

            //verifying unique codcli codes
            if (!in_array($loweredCodcli, $clientCodes)) {
                array_push($clientCodes, $loweredCodcli);
            } else //repeated codcli
            {
                if (!in_array($loweredCodcli, array_keys($repeatedClientCodes))) //repeated for first time
                {
                    $repeatedClientCodes[$loweredCodcli] = 2;
                    $line[1] = $codcli . '(2)';
                } else {
                    var_dump('before' . $repeatedClientCodes[$loweredCodcli]);

                    $repeatedClientCodes[$loweredCodcli] = $repeatedClientCodes[$loweredCodcli] + 1;
                    $line[1] = $codcli . '(' . $repeatedClientCodes[$loweredCodcli] . ')';
                }

                var_dump($repeatedClientCodes[$loweredCodcli]);

            }

            //CRF
            $line[2] = $line[2] == "" ? substr($line[3], 0, 3) . '_CRF' : $line[2];
            $crf = $line[2];
            $loweredcrf = $this->toLower($crf);

            //verifiyng unique rf codes
            if (!in_array($loweredcrf, $rfCodes)) {
                array_push($rfCodes, $loweredcrf);
            } else //repeated crf
            {
                if (!in_array($loweredcrf, array_keys($repeatedRFCodes))) //repeated for first time
                {
                    $repeatedRFCodes[$loweredcrf] = 2;
                    $line[2] = $crf . '(2)';
                } else {
                    var_dump('before' . $repeatedRFCodes[$loweredcrf]);

                    $repeatedRFCodes[$loweredcrf] = $repeatedRFCodes[$loweredcrf] + 1;
                    $line[2] = $crf . '(' . $repeatedRFCodes[$loweredcrf] . ')';
                }

                var_dump($repeatedRFCodes[$loweredcrf]);
            }

            fputcsv($fileOut, $line, ';');
        }

        var_dump('Client codes.........');
        var_dump($clientCodes);

        var_dump('RF codes.........');
        var_dump($rfCodes);

        var_dump('Repeated client codes...............');
        var_dump($repeatedClientCodes);

        var_dump('Repeated rf codes...............');
        var_dump($repeatedRFCodes);

        fclose($file);
        fclose($fileOut);
    }


}