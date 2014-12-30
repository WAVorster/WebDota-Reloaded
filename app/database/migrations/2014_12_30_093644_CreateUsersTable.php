<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('full_name');
			$table->string('account_name');
			$table->string('email');
			$table->string('password');
			$table->char('gender',1);
			$table->integer('age');
			$table->string('country');
			$table->boolean('shared_ip');
			$table->boolean('proxy');
			$table->string('remember_token')->nullable();
			$table->timestamps();
		});
		
		Schema::create('games', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('started_at');
			$table->dateTime('finished_at')->nullable();
			$table->integer('sentinal_players');
			$table->integer('scourge_players');
		});
		
		Schema::create('clans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('game_id');
			$table->char('side',1);
			$table->string('name');
			$table->string('avatar');
			$table->string('description');
			$table->integer('owner_user_id');
			$table->integer('assist_user_id')->nullable();
			$table->integer('honour');
			$table->integer('members');
			$table->integer('stat_war_won');
			$table->integer('stat_war_lost');
			$table->timestamps();
		});
		
		Schema::create('user_game_stats', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->char('side',1);
			$table->integer('hero_id');
			$table->integer('clan_id')->nullable();
			$table->integer('stat_strength');
			$table->integer('stat_agility');
			$table->integer('stat_intellegence');
			$table->integer('stat_kills')->default(0);
			$table->integer('stat_deaths')->default(0);
			$table->integer('stat_consecutive_kills')->default(0);
			$table->integer('stat_assist')->default(0);
			$table->integer('stat_level')->default(1);
			$table->integer('stat_exp')->default(0);
			$table->integer('stat_creeps')->default(0);
			$table->timestamps();
		});
		
		Schema::create('heros', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('description');
			$table->string('avatar');
			$table->char('side',1);
			$table->char('stat_primary',1);
			$table->integer('stat_strength');
			$table->integer('stat_agility');
			$table->integer('stat_intellegence');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
		Schema::drop('games');
		Schema::drop('clans');
		Schema::drop('user_game_stats');
		Schema::drop('heros');
	}

}
