<div v-for="(item, index) in projectListFiltered" :key="index" class="card-project">
	<div class="card-img">
		<img src="<?= Helpers::getAssetsPath() ?>/img/computer-programming.png" />
	</div>
	<div class="card-body">
		<h4 class="title">{{ item?.name }}</h4>
		<div class="content">
			<ul>
				<li>Size : {{ item?.size }}kb</li>
				<li>Permissions : {{ item?.permissions }}</li>
			</ul>
			<ul>
				<li>Last access: {{ new Date(item?.last_access_time).toString().substr(0, 16) }}</li>
				<li>Updated at: {{ new Date(item?.modification_time).toString().substr(0, 16) }}</li>
			</ul>
		</div>
		<div class="footer">
			<ul>
				<li>
					<img class="img-icon" v-if="item?.builded_lang != 'Unknown'" :src="`<?= Helpers::getAssetsPath() ?>/svg/builded_env/${item?.builded_lang?.toLowerCase()}.svg`" />
				</li>
			</ul>
			<div>
				<a :href="item?.project_url" target="blank_" class="btn btn-light btn-circle-icon"><span class="text-accent material-icons icon">visibility</span></a>

				<a href="#" target="blank_" class="btn btn-light btn-circle-icon" @click.prevent="alert('Available soon')"><span class="text-accent material-icons icon">edit</span></a>

				<a href="#" target="blank_" class="btn btn-light btn-circle-icon" :class="{textDanger : isFavorite(item?.name)}" @click.prevent="!isFavorite(item?.name) ? addFavorite(item?.name) : removeFavorite(item?.name)">
					<span class="text-accent material-icons icon">favorite_border</span>
				</a>
			</div>
		</div>
	</div>
</div>
