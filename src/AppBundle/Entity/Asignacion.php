<?php

namespace AppBundle\Entity;

/**
 * Asignacion
 */
class Asignacion
{
    /**
     * @var integer
     */
    private $idAsignacion;

    /**
     * @var \AppBundle\Entity\Empleado
     */
    private $idEmpleado;

    /**
     * @var \AppBundle\Entity\Proyecto
     */
    private $idProyecto;


    /**
     * Get idAsignacion
     *
     * @return integer
     */
    public function getIdAsignacion()
    {
        return $this->idAsignacion;
    }

    /**
     * Set idEmpleado
     *
     * @param \AppBundle\Entity\Empleado $idEmpleado
     *
     * @return Asignacion
     */
    public function setIdEmpleado(\AppBundle\Entity\Empleado $idEmpleado = null)
    {
        $this->idEmpleado = $idEmpleado;

        return $this;
    }

    /**
     * Get idEmpleado
     *
     * @return \AppBundle\Entity\Empleado
     */
    public function getIdEmpleado()
    {
        return $this->idEmpleado;
    }

    /**
     * Set idProyecto
     *
     * @param \AppBundle\Entity\Proyecto $idProyecto
     *
     * @return Asignacion
     */
    public function setIdProyecto(\AppBundle\Entity\Proyecto $idProyecto = null)
    {
        $this->idProyecto = $idProyecto;

        return $this;
    }

    /**
     * Get idProyecto
     *
     * @return \AppBundle\Entity\Proyecto
     */
    public function getIdProyecto()
    {
        return $this->idProyecto;
    }
}

