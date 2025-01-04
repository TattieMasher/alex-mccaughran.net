<section class="backend-code-section">
    <h2 class="section-title">MySQL</h2>
    <div>
        <p>
            First of all, we define the <a class="about-link" href="https://github.com/TattieMasher/HistoryHike/tree/master/Backend/database">database schema</a> as follows:
        </p>
        <ul>
            <li>Objectives: Stores latitude, longitude coordinates against text titles and desriptions, to convey a historical story in sequence. An image url is also stored, making the story engaging.</li>
            <li>Quests: Holds the overall details of a quest, alongside preview, full and completion descriptions.</li>
            <li>Quest Objectives: Maps objectives to quests and stores the order of each within a quest, which allows quests to be progressed and ultimately completed.</li>
            <li>Artefacts: Stores textual descriptions of historical artefacts and references the quest from which they can be earned. There's also an image url to display the artefact.</li>
            <li>Users: Stores user details.</li>
            <li>Artefact User: Maps a record of which user earned which artefact and when. This also acts as a quest completion log, due to the logic of the application.</li>
        </ul>
    </div>
    <div>
        <img style="width: 100%;" src="/images/projects/history-hike/db-schema.png">
    </div>
    <div>
        <p>
          TODO
            Can probably elaborate on why this storage solution works and also on the triggers/functions used in the database. Would be good to represent it visually somehow.
        </p>
    </div>
</section>