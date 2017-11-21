<?php

namespace AppBundle\Entity;

/**
 * Proyecto
 */
class Proyecto
{
    /**
     * @var integer
     */
    private $idProyecto;

    /**
     * @var string
     */
    private $nombreProyecto;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $presupuesto;

    /**
     * @var string
     */
    private $encargado;


    /**
     * Get idProyecto
     *
     * @return integer
     */
    public function getIdProyecto()
    {
        return $this->idProyecto;
    }

    /**
     * Set nombreProyecto
     *
     * @param string $nombreProyecto
     *
     * @return Proyecto
     */
    public function setNombreProyecto($nombreProyecto)
    {
        $this->nombreProyecto = $nombreProyecto;

        return $this;
    }

    /**
     * Get nombreProyecto
     *
     * @return string
     */
    public function getNombreProyecto()
    {
        return $this->nombreProyecto;
    }

    
    public function __tostring()
    {
        return $this->nombreProyecto;
    }
    
    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Proyecto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set presupuesto
     *
     * @param string $presupuesto
     *
     * @return Proyecto
     */
    public function setPresupuesto($presupuesto)
    {
        $this->presupuesto = $presupuesto;

        return $this;
    }

    /**
     * Get presupuesto
     *
     * @return string
     */
    public function getPresupuesto()
    {
        return $this->presupuesto;
    }

    /**
     * Set encargado
     *
     * @param string $encargado
     *
     * @return Proyecto
     */
    public function setEncargado($encargado)
    {
        $this->encargado = $encargado;

        return $this;
    }

    /**
     * Get encargado
     *
     * @return string
     */
    public function getEncargado()
    {
        return $this->encargado;
    }
}

