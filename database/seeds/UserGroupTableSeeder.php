<?php

use Illuminate\Database\Seeder;

class UserGroupTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $userGroups = [
      [
        "name" => "developer",
        "title" => "Developer",
        "permissions" => []
      ],
      [
        "name" => "tester",
        "title" => "Tester",
        "permissions" => []
      ],
      [
        "name" => "administrator",
        "title" => "Administrator",
        "permissions" => []
      ],
      [
        "name" => "moderator",
        "title" => "Moderator",
        "permissions" => []
      ],
      [
        "name" => "user",
        "title" => "User",
        "permissions" => null
      ],
      [
        "name" => "visitor",
        "title" => "Visitor",
        "permissions" => null
      ]
    ];

     // TODO Use repository where appropriate
    foreach ($userGroups as $userGroup) {
      $newUserGroup = \Eos\Entities\UserGroup::create([
        "name" => $userGroup["name"],
        "title" => @$userGroup["title"]
      ]);

      if (@$userGroup["permissions"] !== null && count($userGroup["permissions"]) > 0) {
        foreach ($userGroup["permissions"] as $permissionId) {
          $newUserGroup->permissions()->save(\Eos\Entities\Permission::find($permissionId));
        }
      }
    }
  }
}
