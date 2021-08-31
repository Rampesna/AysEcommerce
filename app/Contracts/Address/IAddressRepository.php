<?php

namespace App\Contracts\Address;

interface IAddressRepository
{
    /**
     * @param int $pageIndex
     * @param int $pageSize
     * @param string $orderBy
     * @param string $orderType asc/desc
     */
    public function index(int $pageIndex = 0, int $pageSize = 10, string $orderBy = 'id', string $orderType = 'asc');

    /**
     * @param int $id
     */
    public function show($id);

    /**
     * @param \App\Http\Requests\Address\StoreRequest $request
     */
    public function store(\App\Http\Requests\Address\StoreRequest $request);

    /**
     * @param \App\Http\Requests\Address\UpdateRequest $request
     */
    public function update(\App\Http\Requests\Address\UpdateRequest $request);

    /**
     * @param \App\Models\Address\Address $address
     * @param string $name
     * @param string $firstName
     * @param string $lastName
     * @param string $phoneNumber
     * @param integer $countryId
     * @param integer $cityId
     * @param integer $districtId
     * @param integer $neighbourhoodId
     */
    public function save(
        \App\Models\Address\Address $address,
        string                      $name,
        string                      $firstName,
        string                      $lastName,
        string                      $phoneNumber,
        int                         $countryId,
        int                         $cityId,
        int                         $districtId,
        int                         $neighbourhoodId
    );

    /**
     * @param int $id
     */
    public function destroy($id);
}
