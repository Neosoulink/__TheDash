<div class="card-project">
	<div class="card-img">
		<img src="<?= Helpers::getAssetsPath() ?>/img/computer-programming.png" />
	</div>
	<div class="card-body">
		<h4 class="title">{{ item?.name }}</h4>
		<div class="content">
			<ul>
				<li>Size : {{ item?.size }}</li>
				<li>Permissions : {{ item?.stat?.mode }}</li>
			</ul>
			<ul>
				<li>Created at : {{ item?.inode_change_time }}</li>
				<li>Updated at : {{ item?.modification_time }}</li>
			</ul>
		</div>
		<div class="footer">
			<ul>
				<li>
					<img class="img-icon" v-if="item?.builded_lang != 'Unknown'" :src="`<?= Helpers::getAssetsPath() ?>/svg/builded_env/${item?.builded_lang?.toLowerCase()}.svg`" />
				</li>
			</ul>
			<div>
				<a :href="optionItems.enableVirtualHost
					? 'http://' + item?.name + '.' + optionItems.domainVirtualHost
					: item?.project_url + ((
						item?.builded_lang?.toLowerCase() === 'laravel'
						&& optionItems.laravelPublicDirSupport
					)
						? '/public'
						: ''
				)" :target="optionItems.openWithBlank ? 'blank_' : '' " class="btn btn-light btn-circle-icon"><span class="text-accent material-icons icon">visibility</span></a>

				<a href="#" target="blank_" class="btn btn-light btn-circle-icon" @click.prevent="alert('Available soon')"><span class="text-accent material-icons icon">edit</span></a>

				<a href="#" target="blank_" class="btn btn-light btn-circle-icon" :class="{favorite : isFavorite(item?.name)}" @click.prevent="!isFavorite(item?.name) ? addFavorite(item?.name) : removeFavorite(item?.name)">
					<span class="text-accent material-icons icon">{{isFavorite(item?.name) ? 'favorite' : 'favorite_border'}}</span>
				</a>
			</div>
		</div>
	</div>
</div>
