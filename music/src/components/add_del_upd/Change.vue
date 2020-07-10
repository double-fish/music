<template>
  <div>
    <!--按钮、表格-->
    <el-card class="db-content">
      <form>
        <div class="upload">
          <Upload @to-name="getName"></Upload>
          <div class="add">
            <div>
              歌名：
              <input type="text" v-model="song" />
            </div>
            <div>
              歌手：
              <input type="text" v-model="singer" />
            </div>
            <div>
              <button class="add-button" type="button" @click="add">增加</button>
            </div>
          </div>
        </div>
      </form>
      <el-table :data="musicList" stripe>
        <el-table-column class="th" prop="song" label="歌名" align="center"></el-table-column>
        <el-table-column class="th" prop="singer" label="歌手" align="center"></el-table-column>
        <el-table-column class="th" label="操作" fixed="right" align="center">
          <template slot-scope="scope">
            <el-button class="cz" size="small" @click="handleEdit(scope.$index, scope.row)">编辑</el-button>
            <el-button class="cz" size="small" @click="remove(scope.$index, scope.row)">删除</el-button>
          </template>
        </el-table-column>
      </el-table>
    </el-card>
    <!--弹窗-->
    <el-dialog :title="dialogTitle" width="50%" :visible.sync="iconFormVisible">
      <el-form :inline="true" :model="musicInfo" class="demo-form-inline">
        <el-form-item label="歌名">
          <el-input v-model="musicInfo.song" placeholder="歌名"></el-input>
        </el-form-item>
        <el-form-item label="歌手">
          <el-input v-model="musicInfo.singer" placeholder="歌手"></el-input>
        </el-form-item>
      </el-form>
      <div slot="footer" class="dialog-footer">
        <el-button @click="iconFormVisible = false">取 消</el-button>
        <el-button type="primary" @click="submitUser()">确 定</el-button>
      </div>
    </el-dialog>
  </div>
</template>
<script>
import { request } from "@/network/request";
import Upload from "../upload/Upload";
export default {
  components: {
    Upload
  },
  data() {
    return {
      iconFormVisible: false,
      musicInfo: {},
      dialogTitle: "增加",
      rowIndex: null,
      musicList: [],
      id: "",
      song: "",
      singer: "",
      filename: ""
    };
  },

  methods: {
    songlist() {
      request({
        url: "/music.php"
      })
        .then(res => {
          this.musicList = res.data.data;
        })
        .catch(err => {
          console.log(err);
        });
    },

    // 编辑
    handleEdit(index, row) {
      this.dialogTitle = "编辑";
      this.musicInfo = row;
      this.iconFormVisible = true;
      this.rowIndex = index;
    },
    getName(name) {
      this.filename = name;
      console.log(this.filename);
    },
    /* 添加 */
    add() {
      request({
        url: "/add.php",
        params: {
          song: this.song,
          singer: this.singer,
          filename: this.filename
        }
      })
        .then(res => {
          console.log(res);
          this.songlist();
          if(res.data.code==0){
        alert('请上传音乐/输入歌名/输入歌手')
          }else{
            alert('添加成功')
          } ;
           this.song ="";
          this.singer ="";
        })
        .catch(err => {
          console.log(err);
        });
    },
    // 弹窗确定
    submitUser() {
      if (this.dialogTitle === "编辑") {
        /* this.musicList.splice(this.rowIndex, 1, this.musicInfo); */
        this.id = this.musicList[this.rowIndex].ID;
        this.song = this.musicInfo.song;
        this.singer = this.musicInfo.singer;
        request({
          url: "/upd.php",
          params: {
            id: this.id,
            song: this.song,
            singer: this.singer,
            filename: this.filename
          }
        })
          .then(res => {
            console.log(res);
            this.songlist();
            if(res.data.code==0){
              alert('输入歌名/输入歌手')
            }else(
              alert('修改成功')
            )
            this.song ='';
            this.singer ='';
          })
          .catch(err => {
            console.log(err);
          });
        this.iconFormVisible = false;
        return;
      }
      /* this.musicList.splice(0, 0, this.musicInfo); */
      this.iconFormVisible = false;
    },
    // 删除
    remove(index, row) {
      this.$confirm(`确定删除${row.song}吗?`, "提示", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        type: "error"
      }).then(() => {
        this.id = this.musicList[index].ID;
        request({
          url: "/del.php",
          params: {
            id: this.id
          }
        })
          .then(res => {
            this.songlist();
            console.log(this.id);
          })
          .catch(err => {
            console.log(err);
          });
      });
    }
  },
  created() {
    this.songlist();
    /* console.log(this.filename); */
  }
};
</script>
<style scoped>
.add-button{
  width:100px;
  height: 30px;
  background: #fff;
  border: 1px solid #dcdfe6;
  color: #606266;
  border-radius: 5px;
  text-align: center;
  outline: none;
}
.add-button:hover {
  color: #409eff;
  border-color: #c6e2ff;
  background-color: #ecf5ff;
}
.db-content {
  position: relative;
  width: 100%;
  height: 900px;
  overflow-y: scroll;
}
.db-content::-webkit-scrollbar {
  display: none;
}

.add {
  display: flex;
  justify-content: space-around;
}
.add div {
  margin: 10px 20px;
}
.cz {
  width: 60px;
}
</style>