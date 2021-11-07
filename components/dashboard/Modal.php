	<div class="modal" :class="{visible: showModal}" @click.self="currentModal = null">
		<div class="card-content">
			<button class="btn btn-light btn-circle-icon close-btn" @click="currentModal = null">
				<span class="material-icons icon">close</span>
			</button>
			<h3 class="card-title"></h3>

			<div class="card-body">

			</div>
		</div>
	</div>
