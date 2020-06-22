<?php

namespace App\Entity;

use App\Repository\GeoDataRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GeoDataRepository::class)
 *
 * @ApiResource(
 *      collectionOperations={
 *          "get",
 *          "post"
 *      },
 *      itemOperations={
 *          "get"
 *      },
 *      normalizationContext={"groups"="geo_data:read"},
 *      denormalizationContext={"groups"="geo_data:write"}
 * )
 */
class GeoData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Groups({"geo_data:read", "geo_data:write"})
     */
    private $temperature;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="geoData")
     * @Groups({"geo_data:read", "geo_data:write"})
     */
    private $user;

    /**
     * @ORM\Column(type="float")
     * @Groups({"geo_data:read", "geo_data:write"})
     */
    private $humidity;

    /**
     * @ORM\Column(type="float")
     * @Groups({"geo_data:read", "geo_data:write"})
     */
    private $airPressure;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getHumidity(): ?float
    {
        return $this->humidity;
    }

    public function setHumidity(float $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getAirPressure(): ?float
    {
        return $this->airPressure;
    }

    public function setAirPressure(float $airPressure): self
    {
        $this->airPressure = $airPressure;

        return $this;
    }
}
